use educayso_facae;

create table horasasignatura(idhorasasignatura int(11) not null  auto_increment primary key , idtipohorasasignatura int(11), cantidad decimal(5,2),idasignatura int(11));

create table tipohorasasignatura(idtipohorasasignatura int(11) not null  auto_increment primary key , nombre varchar(100));

