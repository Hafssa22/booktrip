# Utiliser une image officielle PHP avec Apache
FROM php:8.1-apache

# Copier les fichiers du projet vers le dossier Apache
COPY ./public/ /var/www/html/

# Activer les extensions PHP nécessaires
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
