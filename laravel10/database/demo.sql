create database laravel10 default character set utf8 collate utf8_unicode_ci;
use laravel10;
create table if not exists category (
    id int primary key auto_increment,
    name varchar(100) not null unique,
    status tinyint(1) default '1',
    prioty tinyint default '0',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) engine =innodb;

create table if not exists account (
    id int primary key auto_increment,
    name varchar(100) not null ,
    password varchar(100) not null ,
    phone varchar(100) not null unique,
    email varchar(100) not null unique,
    address varchar(250)  null ,
    role varchar(100)  default 'customer' ,
    status tinyint(1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) engine =innodb;


    create table if not exists banner (
    id int primary key auto_increment,
    name varchar(200) not null,
    image varchar(200) not null,
    link varchar(200) default '#',
    description varchar(200) ,
    status tinyint(1) default '1',
    prioty tinyint default '0',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) engine =innodb;


    create table if not exists blog (
    id int primary key auto_increment,
    name varchar(200) not null,
    image varchar(200) not null,
    sumary varchar(255) ,
    description text ,
    status tinyint(1) default '1',
    account_id int not null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE
    CURRENT_TIMESTAMP,
    foreign key (account_id) references account(id)
    ) engine =innodb;

      create table if not exists orders (
    id int primary key auto_increment,
    name varchar(200) not null,
    phone varchar(100)  null ,
    email varchar(100)  null ,
    address varchar(250)  null ,
    note text ,
    status tinyint(1) default '1',
    account_id int not null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE
    CURRENT_TIMESTAMP,
    foreign key (account_id) references account(id)
    ) engine =innodb;


      create table if not exists order_detail (
   order_id int not null,
   product_id int not null,
   quantity int not null,
   price float not null,
    foreign key (order_id) references orders(id),
    foreign key (product_id) references product(id)
    ) engine =innodb;

      create table if not exists products (
    id int primary key auto_increment,
    name varchar(200) not null,
    image varchar(200) not null,
    description varchar(200) ,
    status tinyint(1) default '1',
    category_id int,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     foreign key (category_id) references category(id)
    ) engine =innodb;

