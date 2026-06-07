#!/bin/bash
set -e

echo "Starting Papac & Co Application..."

# Create required directories
mkdir -p /app/var/cache /app/var/logs /app/var/sessions /app/var/storage

# Ensure .env.json exists
if [ ! -f /app/.env.json ]; then
    echo '{}' > /app/.env.json
fi

# Run migrations
echo "Running migrations..."
php bow migrate 2>&1 || {
    echo "Migration command failed. Continuing..."
}

# Start supervisor and wait
echo "Starting supervisord..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
