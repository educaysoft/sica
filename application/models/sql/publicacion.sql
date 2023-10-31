use educayso_facae;

create table publicacion(idpublicacion int(11) not null  auto_increment primary key , idtipopublicacion int(11), titulo varchar(200),fechapublicacion date,url varchar(500),
foreign key (idtipopublicacion) references tipopublicacion(idtipopublicacion)
);

create table tipopublicacion(idtipopublicacion int(11) not null  auto_increment primary key , nombre varchar(100));

