FROM wayarmy/php:7.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY . /var/www/html
CMD ["apache2-foreground"]
