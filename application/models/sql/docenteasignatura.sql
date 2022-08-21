use educayso_facae;

create table docenteasignatura(iddocenteasignatura int(11) not null auto_increment,
       	iddocente int(11),
       	idasignatura int(11),
       	idperiodoacademico int(11),
	primary key (iddocenteasignatura),
	foreign key (iddocente) REFERENCES docente(iddocente),
	foreign key (idasignatura) REFERENCES asignatura(idasignatura),
	foreign key (idperiodoacademico) REFERENCES periodoacademico(idperiodoacademico)
);
