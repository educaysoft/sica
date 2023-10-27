use educayso_facae;
drop table asignaturadeldocente;
create table asignaturadeldocente(idasignaturadeldocente int(11) not null auto_increment primary key, iddocente varchar(100), idasignatura int(11),fechadesde date, fechahasta date, iddocumento int(11), eliminado tinyint default 0,
foreign key (iddocente) references docente(iddocente),
foreign key (idasignatura) references asignatura(idasignatura),
foreign key (iddocumento) references documento(iddocumento)
);
