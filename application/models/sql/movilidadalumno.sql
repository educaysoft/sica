use educayso_facae;
drop table departamentofuente;
drop table departamentodestino;
drop table etapamovilidadalumno;


create table departamentofuente(iddepartamentofuente int not null auto_increment primary key, iddepartamento int, foreign key(iddepartamento) references departamento(iddepartamento));
create table departamentodestino(iddepartamentodestino int not null auto_increment primary key, iddepartamento int, foreign key(iddepartamento) references departamento(iddepartamento));

create table etapamovilidad(idetapamovilidad int not null auto_increment primary key, nombre varchar(100));
create table movilidadalumno(idmovilidadalumno int not null auto_increment primary key, idpersona int,iddepartamentofuente int, iddepartamentodestino int, foreign key(idpersona) references persona(idpersona), foreign key (iddepartamentofuente) references departamentofuente(iddepartamentofuente), foreign key(iddepartamentodestino) references departamentodestino(iddepartamentodestino));
create table etapamovilidadalumno(idetapamovilidadalumno int not null auto_increment primary key, idmovilidadalumno int,idetapamovilidad int, descripcion text, fecha date, foreign key(idmovilidadalumno references movilidadalumno(idmovilidadalumno), foreign key(idetapamovilidad) references etapamovilidad(idetapamovilidad));

