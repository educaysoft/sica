use educayso_facae;


create table tipoasistencia(idtipoasistencia int(11) not null auto_increment primary key, nombre varchar(100));


create table asistencia(idasistencia int(11) not null auto_increment primary key, idpersona int(11), idevento int(11), fecha date, idtipoasistencia int(11), comentario text); 
