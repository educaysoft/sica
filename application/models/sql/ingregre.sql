drop table tipoingregre;

create table tipoingregre(idtipoingregre int not null auto_increment primary key, nombre varchar(20));

create table ingregre(idingregre int(11) not null auto_increment primary key,fechaingregre datetime, idpersona int(11), valor decimal(10,2),idtipoingregre int, detalle varchar(200), FOREIGN KEY (idpersona)  REFERENCES persona(idpersona), FOREIGN KEY (idtipoingregre) REFERENCES tipoingregre(idtipoingregre));

