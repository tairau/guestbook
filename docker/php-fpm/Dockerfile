FROM ghcr.io/tairau/php-fpm-alpine:3.1.0 as dev

USER root
# Hooks for installing additional extensions or packages
RUN docker-php-ext-install pdo_mysql
USER php

###

FROM dev as backend

COPY --chown=php:php backend/composer.json backend/composer.lock ./

RUN composer install