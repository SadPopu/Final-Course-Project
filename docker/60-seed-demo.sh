#!/bin/sh
# Carrega os dados de demonstração no arranque (o seeder é idempotente).
if [ "${SEED_DEMO:-false}" = "true" ]; then
    echo "AgriShop: a carregar dados de demonstração"
    php /var/www/html/artisan db:seed --force
fi
