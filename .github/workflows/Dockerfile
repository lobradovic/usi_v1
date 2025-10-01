FROM php:8.4-apache

# php ekstenzije
RUN docker-php-ext-install pdo pdo_mysql mysqli

# instalacija comoposer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# mysql server
RUN apt-get update && apt-get install -y default-mysql-server default-mysql-client

# 
WORKDIR /var/www/html
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction

# Expose port
EXPOSE 80 3306

# FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-interaction

EXPOSE 8000

COPY start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]Start script koji pokreće MySQL, migracije i Apache server
COPY start.sh /start.sh
RUN chmod +x /start.sh

CMD ["/start.sh"]

