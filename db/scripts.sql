create table products(
  id int,
  name varchar(50),
  description varchar(100),
  price varchar(30)
);

insert into products values(1001, N'iPhone X', N'The best phone ever', N'$699');
insert into products values(1002, N'Samsung Galaxy Note 8', N'The phone of new world', N'$599');
insert into products values(1002, N'Macbook Pro', N'The best PC', N'$2499');
alter user 'agileadvn'@'%' identified with mysql_native_password by 'agileadvn';
flush privileges;

