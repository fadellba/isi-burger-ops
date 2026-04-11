# Utilisation de l'image officielle PHP 8.4 CLI sous Alpine
FROM php:8.4-cli-alpine

# Installation des dépendances système nécessaires
RUN apk add --no-cache \
    libpng-dev \
    libzip-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    pcre-dev \
    icu-dev

# Installation des outils de compilation (temporaires)
RUN apk add --no-cache --virtual .build-deps \
    autoconf \
    g++ \
    make \
    pkgconf \
    re2c

# Installation des extensions PHP
RUN docker-php-ext-install pdo_pgsql bcmath gd zip intl

# Installation de Redis via PECL
RUN pecl install redis && docker-php-ext-enable redis

# Récupération de Composer depuis l'image officielle
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définition du répertoire de travail
WORKDIR /var/www

# 1. Copier d'abord uniquement les fichiers composer pour optimiser le cache Docker
COPY composer.json composer.lock ./

# 2. Installation des dépendances (sans les scripts pour éviter les erreurs avant la copie du code)
RUN composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader --no-scripts

# 3. Copier le reste de l'application
COPY . .

# 4. Finaliser l'installation (génération de l'autoload et exécution des scripts post-install)
RUN composer dump-autoload --optimize

# Nettoyage des paquets de compilation pour alléger l'image
RUN apk del .build-deps

# Gestion des permissions pour Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exposition du port (si vous utilisez php artisan serve)
EXPOSE 8000

# Commande par défaut pour maintenir le conteneur en vie
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]