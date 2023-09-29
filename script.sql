drop database if exists `db_axpr`;
create database `db_axpr`;
use `db_axpr`;

create table `users` (
    `id`              	integer not null primary key auto_increment,
    `created`        	timestamp not null default current_timestamp, 
    `name`            	varchar(150) not null,
    `email`           	varchar(200) not null,
    `pass`           	varchar(255) not null,
    `zipcode`           varchar(10) not null,
    `number`            varchar(10),
    `address`           text,
    `active`           	tinyint not null DEFAULT 1,
	`admin`           	tinyint not null default 0
)engine=MyISAM;
insert into `users` (`name`, `email`, `pass`, `zipcode`, `number`, `address`, `active`, `admin`) values ('Administrador', 'admin@email.com', md5('123456'), '-', '-', '-', 1, 1);