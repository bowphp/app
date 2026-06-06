#!/bin/sh
set -e

# Set proper permissions for web root
echo "Setting up file permissions..."
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html
chmod -R 775 /var/www/html/var 2>/dev/null || true

# Configure PHP settings based on environment variables
echo "memory_limit=${PHP_MEM_LIMIT}M" >> /usr/local/etc/php/conf.d/docker-php-ext-custom.ini
echo "post_max_size=${PHP_POST_MAX_SIZE}M" >> /usr/local/etc/php/conf.d/docker-php-ext-custom.ini
echo "upload_max_filesize=${PHP_UPLOAD_MAX_FILESIZE}M" >> /usr/local/etc/php/conf.d/docker-php-ext-custom.ini

# Start PHP-FPM in the background
echo "Starting PHP-FPM..."
php-fpm &
PHP_FPM_PID=$!

# Run Bow migration
echo "Running Bow migrations..."
php bow migrate || true

# Start supervisord in the background (manages crond + microservice worker)
echo "Starting supervisord..."
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf &
SUPERVISORD_PID=$!

# Start Nginx in the foreground (replace current process)
echo "Starting Nginx..."
exec nginx -g "daemon off;"
