FROM mysql:5.7.17

MAINTAINER ...

ENV  MYSQL_ROOT_PASSWORD: MYSQL_ROOT_PASSWORD
ENV  MYSQL_DATABASE: MYSQL_DATABASE
ENV  MYSQL_USER: MYSQL_USER
ENV  MYSQL_PASSWORD: MYSQL_PASSWORD

COPY initdb.sql /docker-entrypoint-initdb.d/
RUN chown mysql:mysql /docker-entrypoint-initdb.d/initdb.sql && chmod +x /docker-entrypoint-initdb.d/initdb.sql

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["mysqld"]
