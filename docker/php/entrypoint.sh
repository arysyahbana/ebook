#!/bin/bash

# Exit on error
set -e

# Wait for MySQL to be ready
echo "Waiting for MySQL..."
until mysql -h mysql -u ebook_user -psecret --skip-ssl -e "SELECT 1" >/dev/null 2>&1; do
    sleep 2
done
echo "MySQL is ready!"

# Generate app key if not set
if [ -z "$APP_KEY" ] || [ "$APP_KEY" = "" ]; then
    echo "Generating APP_KEY..."
    php artisan key:generate --force
fi

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Run seeders
echo "Running seeders..."
php artisan db:seed --force

# Clear and cache config
echo "Optimizing Laravel..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set final permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

echo "Application ready!"

# Execute the main command (php-fpm)
exec "$@"