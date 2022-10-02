FROM php:7.4-fpm-buster

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Update
RUN apt-get -y update --fix-missing && \
    apt-get upgrade -y && \
    apt-get --no-install-recommends install -y apt-utils && \
    rm -rf /var/lib/apt/lists/*


# Install useful tools and install important libaries
RUN apt-get -y update && \
    apt-get -y --no-install-recommends install nano wget \
    dialog \
    libsqlite3-dev \
    libsqlite3-0 && \
    apt-get -y --no-install-recommends install default-mysql-client \
    zlib1g-dev \
    libzip-dev \
    libicu-dev && \
    apt-get -y --no-install-recommends install --fix-missing apt-utils \
    build-essential \
    git \
    curl \
    libonig-dev && \
    apt-get -y --no-install-recommends install --fix-missing libcurl4 \
    libcurl4-openssl-dev \
    unzip \
    zip \
    libpng-dev \
    wkhtmltopdf \
    openssl && \
    rm -rf /var/lib/apt/lists/*

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install x-debug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install extensions
RUN docker-php-ext-install pdo_mysql && \
    docker-php-ext-install pdo_sqlite && \
    docker-php-ext-install mysqli && \
    docker-php-ext-install curl && \
    docker-php-ext-install tokenizer && \
    docker-php-ext-install zip && \
    docker-php-ext-install -j$(nproc) intl && \
    docker-php-ext-install mbstring && \
    docker-php-ext-install gettext && \
    docker-php-ext-install exif && \
    docker-php-ext-install bcmath && \
    docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Adding composer package
RUN composer global require "squizlabs/php_codesniffer=*"
RUN echo '' >> ~/.bashrc && \
    echo 'export PATH=$PATH:$HOME/.composer/vendor/bin/' >> ~/.bashrc && \
    echo '' >> ~/.bashrc

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
