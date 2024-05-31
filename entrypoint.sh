#!/bin/sh

# Checking if the database has already been initialized
if [ ! -f /app/.initialized ]; then
    # Generate an application key. Re-cache.
    php artisan key:generate
    php artisan config:clear
    php artisan config:cache

    # Run database migrations.
    php artisan migrate:refresh --seed

    # Run database seed
    php artisan db:seed

    # Create a marker file to mark the database as initialized
    touch /app/.initialized
fi

# Run Laravel server
php artisan serve --host=0.0.0.0 --port=8000
