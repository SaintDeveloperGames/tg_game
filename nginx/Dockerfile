FROM mirror.gcr.io/library/nginx:1.26
COPY ./conf.d/default.conf /etc/nginx/conf.d/
COPY ./html /var/www/html
RUN apt-get update && apt-get install -y python3-certbot-nginx

EXPOSE 80
EXPOSE 443
CMD ["nginx", "-g", "daemon off;"]