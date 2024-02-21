FROM php:8.2-fpm 
COPY php.ini /usr/local/etc/php/
RUN apt-get update && apt-get install -y \
zlib1g-dev \
libzip-dev \
vim \
&& docker-php-ext-install zip pdo_mysql opcache
WORKDIR /var/www
COPY --from=stripe/stripe-cli:v1.19.2 /bin/stripe /usr/bin/stripe
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install npm@latest -g
ENV COMPOSER_ALLOW_SUPERUSER 1 
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN composer global require "laravel/installer"
