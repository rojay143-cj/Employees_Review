# Use official PHP-Apache image
FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev unzip zip curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Set working directory
WORKDIR /var/www/html

# Copy existing project files
COPY . .

# Set file permissions
RUN chown -R www-data:www-data /var/www/html

# Expose Apache port
EXPOSE 80
