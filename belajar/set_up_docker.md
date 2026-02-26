## set up docker 
masuk ke dalam ``docker-compose.yml`` lalu lakukan perubahan di dalamnya 
``` bash
version : '3'
services:
  pemweb:
    build: ./php
    image: pemweb_php:latest
    container_name: pemweb
    hostname: "pemweb"
    volumes:
      - ./src:/var/www/html
      - ./php/www.conf:/usr/local/etc/php-fpm.d/www.conf
    working_dir: /var/www/html
    depends_on: 
      - db_pemweb
  db_pemweb:
    image: mariadb:10.2
    container_name: db
    restart: unless-stopped
    tty: true
    ports:
      - "13306:3306"
    volumes:
      - ./db/data:/var/lib/mysql
      - ./db/conf.d:/etc/mysql/conf.d:ro
    environment:
      MYSQL_USER: djambred
      MYSQL_PASSWORD: p455w0rd1!.
      MYSQL_ROOT_PASSWORD: p455w0rd
      TZ: Asia/Jakarta
      SERVICE_TAGS: dev
      SERVICE_NAME: mysql  
  nginx_pemweb:
    build: ./nginx
    image: nginx_pemweb:latest
    container_name: nginx_pemweb
    hostname: "nginx_pemweb"
    ports:
      - "80:80"
    volumes:
      - ./src:/var/www/html
      - ./nginx/default.conf:/etc/nginx/conf.d/default.conf
    depends_on:
      - pemweb
```
masuk kedalam .env lalu lakukan perubahan di dalamnya 
``` bash
COMPOSE_PROJECT_NAME=uyab
REPOSITORY_NAME=belajar
IMAGE_TAG=latest
```
masuk ke dalam ngix/default.conf lalu lakukan peruubahan di daamnya 
``` bash
server {
    listen 80;
    index index.php index.html;
    server_name belajar.my.id localhost;
    error_log /var/log/nginx/belajar.error.log;
    access_log /var/log/nginx/belajar.access.log;
    root /var/www/html/public;
    autoindex_localtime on;
    autoindex on;
    location / {
        try_files $uri $uri/ /index.php?$query_string;
        add_header 'Access-Control-Allow-Origin' * always;
    }

    location ~\.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass belajar:9000;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass_request_headers on;
    }
}
```
lalu kembalii ke dalam unutnuk dan ketikkan
```bash 
docker comppose up -d --build
```
kemudian masuk ke dalam container docker
```bash 
docker exec -it nama(container) bash 
```
