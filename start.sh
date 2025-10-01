#!/bin/bash

# Start MySQL
service mysql start

# Kreiraj bazu
mysql -e "CREATE DATABASE IF NOT EXISTS lana_usi;"
mysql -e "CREATE USER IF NOT EXISTS 'root'@'localhost' IDENTIFIED BY 'secret';"
mysql -e "GRANT ALL PRIVILEGES ON root.* TO 'root'@'localhost';"
mysql -e "FLUSH PRIVILEGES;"

# Migracije
php artisan migrate --force

# Start Laravel server
php artisan serve --host=0.0.0.0 --port=8000
