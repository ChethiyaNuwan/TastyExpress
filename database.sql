-- database name: tastyexpress

create database if not exists tastyexpress;

drop table if exists orders;
drop table if exists users;
drop table if exists foods;
drop table if exists categories;
drop table if exists admin;

create table categories(
    id int not null auto_increment,
    name varchar(20) not null,
    image_path varchar(50) not null,
    description varchar(200) not null,
    primary key (id)
);

create table foods(
    id int not null auto_increment,
    name varchar(20) not null,
    description varchar(200) not null,
    price int not null,
    image_path varchar(50) not null,
    category_id int not null,
    primary key (id),
    foreign key (category_id) references categories(id)
);

create table users (
    first_name varchar(20) not null,
    last_name varchar(20) not null,
    email varchar(50) not null,
    password varchar(20) not null,
    timestamp timestamp not null default current_timestamp,
    primary key (email)
);

create table orders(
    id varchar(20) not null,
    food_id int not null,
    user_email varchar(50) not null,
    status varchar(20) not null default 'Pending',
    timestamp timestamp not null default current_timestamp,
    primary key (id),
    foreign key (food_id) references foods(id),
    foreign key (user_email) references users(email)
);

create table admin(
    email varchar(50) not null,
    password varchar(20) not null,
    primary key (email)
);

insert into admin values('admin@gmail.com','admin123');