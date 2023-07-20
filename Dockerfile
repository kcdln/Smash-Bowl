# Use an official image of PHP which integrate Apache
FROM php:8.0-apache

# Copy the local application files in the PHP container
COPY ./ /var/www/html/

# Expose the 4321 port to access to the application from the host
EXPOSE 4321

##############################################
### All specific PHP extensions which need ###
### to be installed for the application... ###
##############################################
# Install the MySQL client so that PHP can connect to it
RUN docker-php-ext-install pdo pdo_mysql

# Start Apache server
CMD ["apache2-foreground"]
