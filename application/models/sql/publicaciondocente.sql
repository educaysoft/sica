use educayso_facae;
drop table publicaciondocente;
create table publicaciondocente(idpublicaciondocente int(11) not null  auto_increment primary key , idpublicacion int(11), titulo varchar(200),url varchar(500),iddocente int(11),
foreign key (iddocente) references docente(iddocente),
foreign key (idpublicacion) references publicacion(idpublicacion)
);

drop table tipopublicaciondocente;

