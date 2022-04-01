use educayso_facae;

drop table curso;
create table curso(idcurso int(11) not null auto_increment primary key, nombre varchar(100),avance int,duracion int,idevento int(11));
create table cursounidad(idcursounidad int(11) not null auto_increment primary key, nombre varchar(100), idcurso int(11), idvideoturorial int(11),unidad int);



