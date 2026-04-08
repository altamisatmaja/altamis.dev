FROM node:22-bookworm-slim AS frontend-builder

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci

COPY resources ./resources
COPY vite.config.js svelte.config.js ./
RUN npm run build

FROM php:8.4-cli-bookworm

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    APP_ENV=production \
    APP_DEBUG=false \
    APP_URL=http://localhost:5555 \
    SESSION_DRIVER=file \
    QUEUE_CONNECTION=sync \
    CACHE_STORE=file \
    OCTANE_SERVER=swoole \
    OCTANE_HOST=0.0.0.0 \
    OCTANE_PORT=8000

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        autoconf \
        g++ \
        git \
        libonig-dev \
        libxml2-dev \
        make \
        pkg-config \
        unzip \
    && docker-php-ext-install \
        bcmath \
        mbstring \
        pcntl \
    && printf "\n" | pecl install openswoole \
    && docker-php-ext-enable openswoole \
    && rm -rf /var/lib/apt/lists/* /tmp/pear

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .
COPY --from=frontend-builder /app/public/build ./public/build
COPY docker/start-container.sh /usr/local/bin/start-container

RUN mkdir -p storage/logs bootstrap/cache \
    && chmod -R ug+rwx storage bootstrap/cache \
    && composer install --no-dev --prefer-dist --no-interaction --no-progress --optimize-autoloader \
    && (php artisan storage:link || true) \
    && chmod +x /usr/local/bin/start-container

EXPOSE 8000

CMD ["start-container"]
