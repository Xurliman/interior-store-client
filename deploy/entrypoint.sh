#!/bin/sh

cd /var/www/html/


# Checking if the database has already been initialized
if [ ! -f /var/www/html/.initialized ]; then
    
    # first: change group (nginx)
    chown -R :81 ./storage/app
    
    # second: change permissions
    chmod -R 775 ./storage/app
    
    # Generate an application key. Re-cache.
    php artisan key:generate
    php artisan config:clear
    php artisan config:cache

    # Run database migrations.
    php artisan migrate:refresh --seed

    # Run database seed
    php artisan db:seed

    # Create a marker file to mark the database as initialized
    touch /var/www/html/.initialized
fi

# Run Laravel server
php artisan serve --host=0.0.0.0 --port=8000
