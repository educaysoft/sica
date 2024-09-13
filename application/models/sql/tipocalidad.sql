use educayso_facae;
drop table tipocalidad;
create table tipocalidad(idtipocalidad int(11) not null  auto_increment primary key , nombre varchar(100),eliminado tinyint, color varchar(10) default '#f4d5d5');


