use educayso_facae;

create table publicaciondocente(idpublicaciondocente int(11) not null  auto_increment primary key , idtipopublicaciondocente int(11), titulo varchar(200),url varchar(500),iddocente int(11),
foreign key (iddocente) references docente(iddocente)
);

create table tipopublicaciondocente(idtipopublicaciondocente int(11) not null  auto_increment primary key , nombre varchar(100));

