#!/usr/bin/env sh
set -eu

if [ ! -f .env ] && [ -f .env.example ]; then
    cp .env.example .env
fi

mkdir -p storage/logs bootstrap/cache

if ! grep -q '^APP_KEY=base64:' .env; then
    php artisan key:generate --force --no-interaction
fi

if [ ! -L public/storage ]; then
    php artisan storage:link || true
fi

exec php artisan octane:start \
    --server="${OCTANE_SERVER:-swoole}" \
    --host="${OCTANE_HOST:-0.0.0.0}" \
    --port="${OCTANE_PORT:-8000}"
