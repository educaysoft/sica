use educayso_facae;

create table actividadacademica(idactividadacademica int(11) not null  auto_increment primary key , idtipoactividadacademica int(11) default 0, nombre varchar(500),item varchar(10),
foreign key (idtipoactividadacademica) references tipoactividadacademica(idtipoactividadacademica));


