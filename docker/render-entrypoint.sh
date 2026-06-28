#!/usr/bin/env bash
set -e

# Render injects $PORT (defaults to 10000). Make Apache listen on it.
PORT="${PORT:-10000}"
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/:80>/:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# Generate an app key if one wasn't provided via env.
# (Set a permanent APP_KEY in the Render dashboard for stable sessions.)
if [ -z "${APP_KEY}" ]; then
    export APP_KEY="$(php artisan key:generate --show)"
    echo "Generated a temporary APP_KEY for this boot."
fi

# Database: migrate + seed (all seeders are idempotent via updateOrCreate).
php artisan config:clear
php artisan migrate --force
php artisan db:seed --force || true

# Cache config/routes/views for performance.
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec apache2-foreground
