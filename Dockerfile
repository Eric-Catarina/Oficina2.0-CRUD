FROM archlinux

ENV COMPOSER_ALLOW_SUPERUSER "1"
# Create app directory
WORKDIR /usr/src/app

COPY . .

RUN pacman -Syyyu --noconfirm
RUN pacman -S nodejs npm  php php-sqlite composer --noconfirm


RUN echo "extension=pdo_sqlite" >> /etc/php/php.ini

RUN composer install

RUN php artisan optimize:clear

CMD /usr/src/app/run_server_and_client.sh


