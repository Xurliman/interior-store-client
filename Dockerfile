# Use image Alpine Linux
FROM alpine:latest

# Install required dependencies
RUN apk update && apk add --no-cache \
    php \
    php-fileinfo \
    php-session \
    php-tokenizer \
    php-dom \
    php-fpm \
    php-gd \
    php-zip \
    php-pdo_mysql \
    php-xmlwriter  \
    php-xml \
    composer \
    git \
    nodejs \
    npm

# Set working directory
WORKDIR /app

# Copy project files to container
COPY --chown=www:www . .

#USER www:www

# Install Node dependencies.
RUN npm install

# install composer dependencies
RUN composer install --prefer-dist --no-ansi --no-interaction --no-progress

# Copy over example configuration.
# Don't forget to set the database config in .env.example correctly
RUN cp .env.example .env

VOLUME /app/storage

# Run Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000

# The following script runs every time the container starts
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]


