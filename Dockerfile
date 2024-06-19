# Use a imagem oficial do PHP
FROM php:7.4-apache

# Instale extensões do PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copie os arquivos do seu projeto para o contêiner
COPY . /var/www/html

# Configure o Apache para usar o diretório /var/www/html como raiz do documento
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public/!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Ative o módulo de reescrita do Apache
RUN a2enmod rewrite

# Exponha a porta 80 para acessar o servidor web
EXPOSE 80
