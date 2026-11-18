# AgriShop (Laravel 9) para correr no portfolio, dentro de um path (ex.: /agrishop).
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --ignore-platform-reqs

FROM serversideup/php:8.2-fpm-nginx
WORKDIR /var/www/html
COPY --chown=www-data:www-data . .
COPY --chown=www-data:www-data --from=vendor /app/vendor ./vendor
COPY --chmod=755 docker/60-seed-demo.sh /etc/entrypoint.d/60-seed-demo.sh
RUN composer dump-autoload --optimize --no-dev

ENV AUTORUN_ENABLED=true \
    AUTORUN_LARAVEL_MIGRATION=true \
    AUTORUN_LARAVEL_STORAGE_LINK=true \
    PHP_OPCACHE_ENABLE=1 \
    SSL_MODE=off

EXPOSE 8080
