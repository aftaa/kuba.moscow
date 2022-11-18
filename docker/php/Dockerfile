FROM php:8.1-fpm

RUN apt-get update && apt-get install -y curl git mc
WORKDIR /var/www/kuba.moscow

RUN git config --global user.name "Maxim Gabidullin"
RUN git config --global user.email "after@ya.ru"

CMD ["php-fpm"]