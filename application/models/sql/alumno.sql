use educayso_facae;
drop table alumno;
create table alumno (idalumno int not null auto_increment , idpersona int(11),  eliminado tinyint default 0, primary key(idalumno), foreign key(idpersona) references persona (idpersona));

