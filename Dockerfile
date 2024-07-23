FROM php:8.2-apache

# Install the intl PHP extension
RUN apt-get update && \
    apt-get install -y libicu-dev && \
    docker-php-ext-install intl && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Copy the application code to the container
COPY . /var/www/html

# Remove the temp folder
RUN rm -rf /var/www/html/temp
