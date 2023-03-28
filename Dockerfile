FROM php:8.1.1-fpm

# Set php.ini
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Set the working directory to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install any needed packages
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libpq-dev \
    default-mysql-client \
    libmagickwand-dev \
    && docker-php-ext-configure gd --with-jpeg=/usr/include/ \
    && docker-php-ext-install pdo_mysql gd \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Composer and project dependencies
COPY composer.json composer.lock /app/
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Expose port 8000 and start php-fpm server
EXPOSE 8008
CMD php artisan serve --host=0.0.0.0 --port=8008
