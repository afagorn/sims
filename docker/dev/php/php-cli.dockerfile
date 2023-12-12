FROM php:8.2.3-cli-alpine3.17

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions xdebug

COPY ./common/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

ENV PHP_IDE_CONFIG="serverName=sims"

COPY --from=composer/composer:2-bin /composer /usr/bin/composer

WORKDIR /app
