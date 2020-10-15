FROM webdevops/php-apache-dev:7.4

ARG $user
ARG $uid

# 1. apache configs + document root
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 2. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
RUN a2enmod rewrite headers


# 3. precisamos um usario com o mesmo UID/GID do usuario host para que quando utilziarms
#comandos cli todos os arquivos do host manthenham permissoes intactas
#ou de dentro do container criamos arquivos cujo o dono é o root
#o UID é 1001
RUN useradd -G www-data,root  -d /home/serjo serjo
RUN mkdir -p /home/serjo/.composer && \
    chown -R serjo:serjo /home/serjo

USER serjo