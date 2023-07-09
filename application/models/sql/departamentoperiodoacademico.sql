use educayso_facae;

create table departamentoperiodoacademico(iddepartamentoperiodoacademico int(11) not null auto_increment,
       	iddepartamento int(11),
       	idperiodoacademico int(11),
	primary key (iddepartamentoperiodoacademico),
	foreign key (iddepartamento) REFERENCES departamento(iddepartamento),
	foreign key (idperiodoacademico) REFERENCES periodoacademico(idperiodoacademico)
);
