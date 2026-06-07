FROM php:8.4-fpm-alpine AS php

# Install PHP extensions and system dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    nodejs \
    npm \
    libzip-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    libxpm-dev \
    freetype-dev \
    imagemagick \
    imagemagick-dev \
    oniguruma-dev \
    icu-dev \
    linux-headers \
    bash \
    curl \
    git \
    certbot \
    certbot-nginx \
    postgresql-dev

RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg \
    --with-webp

# Install core PHP extensions
RUN docker-php-ext-install -j$(nproc) \
    bcmath \
    mbstring \
    gd \
    pcntl \
    intl \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    exif \
    sockets \
    opcache \
    zip \
    ftp

# Install Redis extension via PECL
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apk del .build-deps

# Copy application code
WORKDIR /var/www/html
COPY . .

# Composer install (if composer.lock present)
RUN if [ -f composer.lock ]; then \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev --no-scripts --no-interaction --no-progress --optimize-autoloader; \
    fi

# Nginx config
RUN mkdir -p /etc/nginx/conf.d /var/run/nginx
COPY system/nginx/nginx.conf /etc/nginx/nginx.conf
COPY system/nginx/nginx-site.conf /etc/nginx/conf.d/default.conf

# PHP config
RUN mkdir -p /var/log/php /var/lib/php/sessions && \
    chown -R www-data:www-data /var/log/php /var/lib/php/sessions
COPY system/php.ini /usr/local/etc/php/conf.d/99-app.ini

# Create log directories (supervisor uses /var/log/supervisor)
RUN mkdir -p /var/log/supervisor /var/log/cron

# Copy supervisor configuration
COPY system/nginx/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Crontab (busybox crond reads /etc/crontabs/root for the root user)
COPY system/crontab /etc/crontabs/root
RUN chmod 0600 /etc/crontabs/root

# Certbot (Let's Encrypt) setup
RUN mkdir -p /etc/letsencrypt /var/lib/letsencrypt /var/log/letsencrypt && \
    chmod 700 /etc/letsencrypt

# Validate nginx config
RUN nginx -t

# Environment variables
ENV SKIP_COMPOSER=1 \
    PHP_ERRORS_STDERR=1 \
    RUN_SCRIPTS=1 \
    REAL_IP_HEADER=1 \
    PHP_MEM_LIMIT=1024 \
    PHP_POST_MAX_SIZE=250 \
    PHP_UPLOAD_MAX_FILESIZE=250 \
    APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    COMPOSER_ALLOW_SUPERUSER=1 \
    SUPERVISOR_LOG_LEVEL=info

# Define public volume
VOLUME /var/www/html/public

# Expose HTTP and HTTPS ports
EXPOSE 80 443

# Entrypoint script to start Supervisor, Nginx, and PHP-FPM
COPY system/nginx/start.sh /start.sh
RUN chmod +x /start.sh

# Download MinIO client
RUN curl -o /var/www/html/mc https://dl.min.io/client/mc/release/linux-amd64/archive/mc \
    && chmod +x /var/www/html/mc

CMD ["/start.sh"]
