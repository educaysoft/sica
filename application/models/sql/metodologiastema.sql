use educayso_facae;
drop table metodologiasasignatura;
drop table tipometodologiasasignatura;
create table metodologiastema(idmetodologiastema int(11) not null  auto_increment primary key , idtipometodologiastema int(11), cantidad decimal(5,2),idtema int(11));
create table tipometodologiastema(idtipometodologiastema int(11) not null  auto_increment primary key , nombre varchar(100));

