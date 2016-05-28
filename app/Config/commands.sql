
create table shops (
id int(11) not null,
name varchar(255) not null,
tel varchar(100) not null,
addr varchar(255) not null,
url varchar(255) not null,
created datetime not null,
updated datetime not null
) ENGINE=InnoDB;

alter table shops
add primary key (id);

alter table shops
modify id int(11) not null auto_increment;

create table 'users' (
id int(11) not null,
email varchar(255) not null,
password varchar(100) not null,
created datetime not null,
updated datetime not null
) ENGINE=InnoDB;

alter table 'users'
ado primary key('id');

alter table 'users'
modify 'id' int(11) not null auto_increment;
