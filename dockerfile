# Use a PHP image with the MySQLi extension
FROM php:latest

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your PHP application files into the container
COPY . /var/www/html

# Install the MySQLi extension
RUN docker-php-ext-install mysqli

# Expose port 80 to access the web server (adjust if your application uses a different port)
EXPOSE 80

# Start the PHP development server (you can replace this with a different web server configuration if needed)
CMD ["php", "-S", "0.0.0.0:80"]
