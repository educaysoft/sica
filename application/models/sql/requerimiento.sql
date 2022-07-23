drop table estadorequerimiento;
drop table requerimiento;
drop table gestion;




create table estadorequerimiento(idestadorequerimiento int not null auto_increment primary key, nombre varchar(50));

create table requerimiento(idrequerimiento int(11) not null auto_increment primary key,detallecorto varchar(50), detallelargo varchar(200), fecharequerimiento datetime, idpersona int(11),idinstitucion int ,idestadorequerimiento int , FOREIGN KEY (idpersona) REFERENCES persona(idpersona), FOREIGN KEY (idestadorequerimiento) REFERENCES estadorequerimiento(idestadorequerimiento), FOREIGN KEY (idinstitucion) REFERENCES institucion(idinstitucion));

create table gestion(idgestion int(11) not null auto_increment primary key, detalle varchar(100),fechagestion datetime, idrequerimiento int(11) , idunidad int, FOREIGN KEY (idrequerimiento) REFERENCES requerimiento(idrequerimiento));

