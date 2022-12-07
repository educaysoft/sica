use educayso_facae;

create table horariodocente(idhorariodocente int(11) not null auto_increment primary key, idperiodoacademico int(11),iddocente int(11));
create table asignaturadocente(idasignaturadocente int(11) not null auto_increment primary key, idhorariodocente varchar(100), idasignatura int(11));

create table jornadadocente(idjornadadocente int(11) not null auto_increment primary key,asignaturadocente int(11), iddiasemana int,horainicio time,duracionminutos int);


