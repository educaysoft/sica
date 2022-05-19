use educayso_facae;

drop table tiposeguimiento;
create table tiposeguimiento(idtiposeguimiento int(11) not null auto_increment primary key, nombre varchar(100));


create table seguimiento(idseguimiento int(11) not null auto_increment primary key, idpersona int(11), idevento int(11), fecha date, idtiposeguimiento int(11), comentario text); 
