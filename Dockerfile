FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy project files
COPY . /var/www/html/

EXPOSE 80
