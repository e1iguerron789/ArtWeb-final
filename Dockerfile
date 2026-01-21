FROM richarvey/nginx-php-fpm:3.1.6

# Copiar todo el proyecto al contenedor
COPY . /var/www/html
WORKDIR /var/www/html

# Configuración básica
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV SKIP_COMPOSER 1

# Instalar Node y npm (para Vite)
RUN apk update && apk add --no-cache nodejs npm

# Construir frontend (Vite)
RUN npm install
RUN npm run build

# Ejecutar script de inicio
CMD ["/start.sh"]
