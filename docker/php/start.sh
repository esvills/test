#!/bin/bash
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
php-fpm
