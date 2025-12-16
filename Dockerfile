FROM ubuntu:24.04
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    libapache2-mod-php \
    php-mysqli \
    mariadb-server \
    supervisor \
  && rm -rf /var/lib/apt/lists/*


COPY ./src/ /var/www/html 

COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

VOLUME ["/var/lib/mysql"]

EXPOSE 80

ENTRYPOINT ["/entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-n"]