use educayso_facae;
create table pertinencia(idpertinencia int(11) not null auto_increment primary key, idestudio int(11), iddepartamento int(11),
foreign key (idestudio) references estudio(idestudio),
foreign key (iddepartamento) references departamento(iddepartamento),
unique key estudepa  (idestudio,iddepartamento)
);


