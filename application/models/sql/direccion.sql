use  educayso_facae;
drop table direcction;
create table direccion (iddireccion int(11) not null auto_increment primary key, nombre varchar(200), iddireccionpostal int(11), idpersona int(11));
