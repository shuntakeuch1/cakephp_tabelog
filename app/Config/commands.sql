
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

create table users (
id int(11) not null,
email varchar(255) not null,
password varchar(100) not null,
created datetime not null,
updated datetime not null
) ENGINE=InnoDB;

alter table users
add primary key(id);

alter table users
modify id int(11) not null auto_increment;

create table reviews(
  id int(11) not null,
  user_id int(11) not null,
  shop_id int(11) not null,
  title varchar(255) not null,
  body text not null,
  score int(11) not null,
  created datetime not null,
  updated datetime not null
  )ENGINE=InnoDB;

alter table reviews
add primary key (id);

alter table reviews
modify id int(11) not null auto_increment;

alter table reviews
add key user_id (user_id),
add key shop_id (shop_id);

alter table reviews
add constraint reviews_ibfk_2 foreign key (shop_id) references shops (id),
add constraint reviews_ibfk_1 foreign key (user_id) references users (id);
