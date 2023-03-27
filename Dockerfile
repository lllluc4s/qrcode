# Use an official PHP runtime as a parent image
FROM php:8.1.1-fpm

# Set php.ini
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Set the working directory to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install any needed packages
RUN apt-get update && \
    apt-get install -y --no-install-recommends && \
    apt-get install -y libpng-dev libjpeg-dev && \
    docker-php-ext-configure gd --with-jpeg=/usr/include/ && \
    docker-php-ext-install pdo_mysql gd && \
    apt-get install -y libpq-dev default-mysql-client && \
    apt-get install -y libmagickwand-dev && \
    pecl install imagick && \
    docker-php-ext-enable imagick

# Install Composer and dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install

# Expose port 8008 and start php-fpm server
EXPOSE 8008
CMD php artisan serve --host=0.0.0.0 --port=8008
