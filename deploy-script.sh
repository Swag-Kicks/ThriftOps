#!/bin/bash

# Change to your application's directory
cd /var/www/html/ThriftOps

# Pull the latest code from the GitHub repository
git pull origin Dev

# Install/update dependencies (if using Composer)
composer install

# Restart the web server to apply changes
sudo systemctl restart httpd
