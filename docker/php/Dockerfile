#Informa o Container base para baixar do Docker Hub
FROM php:8.2.13-fpm

#Setando argumentos para criacao de imagem
ARG user=laravel
ARG uid=1000

#RUN apt-get update && apt-get install -y apt-transport-https

#Atualizando Ubuntu e baixando PHP e suas dependencias
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Limpando o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalando extensoes do PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

#Baixa a ultima versao do composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#Cria usuario do sistema para rodar comandos do Composer e Artisan
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

#Instala redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis
    
#Setando diretorio de uso
WORKDIR /var/www

#Setando usuario de uso
USER $user