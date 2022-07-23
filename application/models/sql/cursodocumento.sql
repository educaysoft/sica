use educayso_facae;

create table cursodocumento(idcursodocumento int(11) not null auto_increment,
       	idcurso int(11),
       	iddocumento int(11),
	primary key (idcursodocumento),
	foreign key (idcurso) REFERENCES curso(idcurso),
	foreign key (iddocumento) REFERENCES documento(iddocumento)
);
