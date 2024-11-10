FROM mirror.gcr.io/library/mysql:5.7

COPY ./mysqld.cnf /etc/mysql/mysql.conf.d/
COPY ./db_tg.sql /docker-entrypoint-initdb.d/

EXPOSE 3306
CMD ["mysqld"]