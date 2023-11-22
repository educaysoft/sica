use educayso_facae;
create table alumno (idalumno int not null , idpersona int(11),  eliminado tinyint default 0, primary key(idalumno), foreign key(idpersona) references persona (idpersona));

