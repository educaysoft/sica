use educayso_facae;

create table referenciasasignatura(idreferenciasasignatura int(11) not null  auto_increment primary key , idtiporeferenciasasignatura int(11), titulo varchar(200),url varchar(500),idasignatura int(11));

create table tiporeferenciasasignatura(idtiporeferenciasasignatura int(11) not null  auto_increment primary key , nombre varchar(100));

