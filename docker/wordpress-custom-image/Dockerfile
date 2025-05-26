FROM wordpress:latest
COPY wp-config.php /var/www/html/
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli