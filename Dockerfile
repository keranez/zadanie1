# Obraz php z docker hub
FROM php:7.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD ["php", "./index.php"]
#Obraz apache
FROM php:7.2-apache
COPY index.php /var/www/html/
