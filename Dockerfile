FROM ubuntu:22.04
RUN apt update && apt install -y nginx 

#ENV DEBIAN_FRONTEND
#RUN apt update && apt install -y php8.1

RUN apt install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php
RUN apt install apt-transport-https lsb-release ca-certificates wget -y
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg 
RUN sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
RUN apt-add-repository --remove https://packages.sury.org/php 
RUN apt update
ENV TZ=Europe/Moscow
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone 
RUN apt install -y php8.1
RUN service nginx start
EXPOSE 80
WORKDIR /var/www/html
RUN apt install -y mc
RUN apt install -y php8.1-fpm