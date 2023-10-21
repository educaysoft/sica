use educayso_facae;

create table docenteactividadacademica(iddocenteactividadacademica int(11) not null  auto_increment primary key , iddistributivodocente int(11) default 0, idactividadacademica int(11),numerohoras decimal(5,2),
foreign key (iddistributivodocente) references distributivodocente(iddistributivodocente),
foreign key (idactividadacademica) references actividadacademica(idactividadacademica));


