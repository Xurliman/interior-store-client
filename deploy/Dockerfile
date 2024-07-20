# deploy/Dockerfile

# stage 1: build stage
FROM php:8.3-fpm-alpine as build

# installing system dependencies and php extensions
RUN apk add --no-cache \
    zip \
    libzip-dev \
    freetype \
    libjpeg-turbo \
    libpng \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    nodejs \
    npm \
    icu-dev \
    curl \
    php-phar \
    php-mbstring \
    php-iconv \
    php-openssl \
    php-gd \
    php-intl \
    php-session \
    php-tokenizer \
    php-fileinfo \
    php-dom \
    php-xmlreader \
    php-zip \
    php-xml \
    php-xmlwriter \
    php-pdo \
    php-pdo_mysql \
    php-fpm \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo pdo_mysql intl \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd


# install composer
COPY --from=composer:2.7.6 /usr/bin/composer /usr/bin/composer

# Set working directory
RUN mkdir /var/www/fantom
WORKDIR /var/www/fantom
COPY . .

# Copy project files to container
#COPY --chown=www:www . .

# copy necessary files and change permissions
RUN chown -R www-data:www-data /var/www/fantom \
    && chmod -R 775 /var/www/fantom/storage \
    && chmod -R 775 /var/www/fantom/bootstrap/cache

#USER www:www

# Install Node dependencies.
#RUN npm install

# install php and node.js dependencies
# install composer dependencies
#RUN composer install --prefer-dist --no-ansi --no-interaction --no-progress
RUN curl -s https://getcomposer.org/installer | php && alias composer='php composer.phar'
RUN composer install
#    && npm install
#    && npm run build


RUN chown -R www-data:www-data /var/www/fantom/vendor \
    && chmod -R 775 /var/www/fantom/vendor


CMD ["php-fpm"]

# stage 2: production stage
FROM php:8.3-fpm-alpine

# install nginx
RUN apk add --no-cache \
    zip \
    libzip-dev \
    freetype \
    libjpeg-turbo \
    libpng \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    oniguruma-dev \
    gettext-dev \
    nginx openrc \
    icu-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip pdo pdo_mysql \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd \
    && docker-php-ext-install bcmath \
    && docker-php-ext-enable bcmath \
    && docker-php-ext-configure intl \
&& docker-php-ext-install intl \
    && docker-php-ext-enable intl \
    && docker-php-ext-install exif \
    && docker-php-ext-enable exif \
    && docker-php-ext-install gettext \
    && docker-php-ext-enable gettext \
    && docker-php-ext-install opcache \
    && docker-php-ext-enable opcache \
    && rm -rf /var/cache/apk/*

# copy files from the build stage
WORKDIR /var/www/fantom
COPY --from=build /var/www/fantom /var/www/fantom
COPY ./deploy/nginx/http.d/default.conf /etc/nginx/http.d/default.conf
COPY ./deploy/php/php.ini "$PHP_INI_DIR/conf.d/app.ini"
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"



# Copy over example configuration.
# Don't forget to set the database config in .env.example correctly
#RUN cp .env.example .env

VOLUME /var/www/fantom/storage/app

RUN mv -fin /var/www/fantom/deploy/.env /var/www/fantom/.env

# The following script runs every time the container starts
COPY ./deploy/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

## Run Laravel server
#CMD php artisan serve

CMD ["sh", "-c", "nginx && php-fpm"]
