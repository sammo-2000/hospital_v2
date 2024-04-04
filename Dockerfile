FROM php:8-apache
RUN a2enmod rewrite
COPY . /var/www/html
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
USER www-data