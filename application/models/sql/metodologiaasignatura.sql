use educayso_facae;
create table metodologiasasignatura(idmetodologiasasignatura int(11) not null  auto_increment primary key , idtipometodologiasasignatura int(11), cantidad decimal(5,2),idasignatura int(11));
create table tipometodologiasasignatura(idtipometodologiasasignatura int(11) not null  auto_increment primary key , nombre varchar(100));

