FROM php:8.2-cli

# Instala dependências do sistema e pdo_pgsql
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_pgsql

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia todo código para o container
COPY . .

# Instala dependências do Laravel
RUN composer install --no-interaction --optimize-autoloader

# Ajusta permissões
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000

# Roda o servidor interno do PHP Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
