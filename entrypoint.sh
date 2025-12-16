#!/bin/bash
set -e
mkdir -p /run/mysqld
chown -R mysql:mysql /run/mysqld

: "${MYSQL_ROOT_PASSWORD:=123}"
: "${MYSQL_DATABASE:=vasilev}"


if [ ! -d /var/lib/mysql/mysql ]; then
  mkdir -p /var/lib/mysql
  chown -R mysql:mysql /var/lib/mysql

  mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql


  mysqld_safe --datadir=/var/lib/mysql --skip-networking &
  pid="$!"


  until mariadb-admin ping --silent; do
    sleep 1
  done

  mariadb -uroot <<SQL
ALTER USER 'root'@'localhost' IDENTIFIED BY '${MYSQL_ROOT_PASSWORD}';
CREATE DATABASE IF NOT EXISTS \`${MYSQL_DATABASE}\`;
FLUSH PRIVILEGES;
SQL


  mariadb-admin -uroot -p"${MYSQL_ROOT_PASSWORD}" shutdown
  wait "$pid"
fi

exec "$@"
