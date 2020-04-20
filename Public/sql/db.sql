create database blog;

use blog;

create table blog_user(
	id int unsigned not null  primary key auto_increment,
	username varchar(16) not null,
	passwd varchar(40) not null,
	email varchar(100) not null
);

create table blog_msg(
	postid int unsigned not null auto_increment primary key ,
	poster int unsigned not null ,
	title char(20) not null,
	des char(20) not null,
	posted datetime not null,
	message text,
	foreign key(poster) references blog_user(id) on update cascade on delete cascade
);

grant select, delete, insert, update
on blog.*
to blog@localhost identified by 'blog';
