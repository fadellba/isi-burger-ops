FROM php:8.4-cli-alpine

# Installation des dépendances système (libpq-dev est crucial pour Postgres)
RUN apk add --no-cache libpng-dev libzip-dev libpq-dev zip unzip git curl pcre-dev $PHPIZE_DEPS

# Installation des extensions PHP
RUN docker-php-ext-install pdo_pgsql bcmath gd zip

# Installation de Redis
RUN pecl install redis && docker-php-ext-enable redis

# On récupère Composer depuis l'image officielle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# On copie le code terminé dans l'image
COPY . .

# On nettoie les outils de compilation pour que l'image reste légère
RUN apk del pcre-dev $PHPIZE_DEPS

# Droits pour Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 80

CMD php artisan serve --host=0.0.0.0 --port=80