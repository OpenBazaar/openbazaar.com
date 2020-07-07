# Base image
FROM php:7.4-apache

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Run apt update and install some dependancies needed for docker-php-ext
RUN apt update && apt install -y apt-utils sendmail mariadb-client unzip zip libpng-dev libmcrypt-dev git

RUN docker-php-ext-install mysqli gettext

# PECL modules
RUN pecl install apcu && docker-php-ext-enable apcu \
  && pecl install apcu_bc-beta && docker-php-ext-enable --ini-name=docker-php-ext-apcu_bc.ini apc

# Enable mod_rewrite
RUN a2enmod rewrite