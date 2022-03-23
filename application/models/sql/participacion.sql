use educayso_facae;

drop table tipoparticipacion;
drop table participacion;

create table tipoparticipacion(idtipoparticipacion int(11) not null auto_increment primary key, nombre varchar(100));


create table participacion(idparticipacion int(11) not null auto_increment primary key, idpersona int(11), idevento int(11), fecha date, idtipoparticipacion int(11), porcentaje  decimal(5,2), comentario text); 
