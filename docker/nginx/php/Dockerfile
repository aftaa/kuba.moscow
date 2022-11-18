FROM php:8.1-fpm

RUN apt-get update && apt-get install -y curl git mc
WORKDIR /var/www/kuba.moscow

CMD ["php-fpm"]