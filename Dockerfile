# Utilisation de PHP 8.4 CLI sur Alpine
FROM php:8.4-cli-alpine

# Installation des dépendances système
RUN apk add --no-cache \
    libpng-dev \
    libzip-dev \
    libpq-dev \
    icu-dev \
    libintl \
    zip \
    unzip \
    git \
    curl \
    pcre-dev

# Outils de build temporaires (supprimés à la fin pour alléger l'image)
RUN apk add --no-cache --virtual .build-deps \
    autoconf \
    g++ \
    make \
    pkgconf \
    re2c \
    icu-static

# Installation des extensions PHP
# On installe intl séparément pour mieux isoler les erreurs si besoin
RUN docker-php-ext-configure intl && \
    docker-php-ext-install -j$(nproc) intl pdo_pgsql bcmath gd zip

# Installation de Redis
RUN pecl install redis && docker-php-ext-enable redis

# Nettoyage immédiat des outils de build pour libérer de l'espace
RUN apk del .build-deps

# Récupération de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Stratégie de cache pour les dépendances
COPY composer.json composer.lock ./
RUN composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader --no-scripts

# Copie du reste du code
COPY . .

# Finalisation de l'autoload
RUN composer dump-autoload --optimize

# Droits sur les dossiers Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]