# DOC as one container: PHP + the built front end + a seeded SQLite database (a demo, not a production image).
FROM php:8.3-cli

RUN apt-get update && apt-get install -y --no-install-recommends \
      git unzip curl libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libicu-dev libonig-dev libsqlite3-dev \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_sqlite zip intl gd bcmath exif mbstring \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app/
RUN composer install --no-interaction --prefer-dist --no-progress \
    && npm install --no-audit --no-fund && npm run build && rm -rf node_modules

COPY docker/start.sh /usr/local/bin/start-app
RUN chmod +x /usr/local/bin/start-app

ENV APP_ENV=production APP_DEBUG=false DB_CONNECTION=sqlite DB_DATABASE=/app/database/database.sqlite \
    SESSION_DRIVER=file CACHE_STORE=file LOG_CHANNEL=stderr

EXPOSE 10000
CMD ["start-app"]
