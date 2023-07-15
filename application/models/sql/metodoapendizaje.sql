use educayso_facae;
drop table  metodoaprendizajetema;
drop table  metodoaprendizaje;
create table metodoaprendizajetema(idmetodoaprendizajetema int(11) not null  auto_increment primary key , idmetodoapendizaje int(11), idtema int(11));
create table metodoaprendizaje(idmetodoaprendizaje int(11) not null  auto_increment primary key , nombre varchar(100), descripcion text);

