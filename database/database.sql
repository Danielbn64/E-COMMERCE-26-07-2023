CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE users(
id              int(255) auto_increment not null,
name            varchar(100) not null,
surnames        varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
image           varchar(255),
CONSTRAINT pk_user PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)  
)ENGINE=InnoDb;


CREATE TABLE categories(
id              int(255) auto_increment not null,
name            varchar(100) not null,
CONSTRAINT pk_categories PRIMARY KEY(id) 
)ENGINE=InnoDb;

CREATE TABLE products(
id              int(255) auto_increment not null,
category_id     int(255) not null,
name            varchar(100) not null,
description     text,
price           float(100,2) not null,
stock           int(255) not null,
offers          varchar(2),
date            date not null,
image           varchar(255),
CONSTRAINT pk_categories PRIMARY KEY(id),
CONSTRAINT fk_product_category FOREIGN KEY(category_id) REFERENCES categories(id)
)ENGINE=InnoDb;


CREATE TABLE orders(
id              int(255) auto_increment not null,
user_id         int(255) not null,
province        varchar(100) not null,
location        varchar(100) not null,
address         varchar(255) not null,
cost            float(200,2) not null,
status          varchar(20) not null,
date            date,
hour            time,
CONSTRAINT pk_orders PRIMARY KEY(id),
CONSTRAINT fk_order_user FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE order_line(
id              int(255) auto_increment not null,
order_id        int(255) not null,
product_id      int(255) not null,
units           int(255) not null,
CONSTRAINT pk_order_line PRIMARY KEY(id),
CONSTRAINT fk_order_line FOREIGN KEY(order_id) REFERENCES orders(id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT fk_product_line FOREIGN KEY(product_id) REFERENCES products(id)
)ENGINE=InnoDb;




