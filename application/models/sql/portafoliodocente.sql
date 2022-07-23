use educayso_facae;
create table portafoliodocente(
	idportafoliodocente int(11) not null auto_increment,
	idportafoliomodelo int(11),
	idportafolioestado int(11),
	iddocente int(11),
	iddocumento int(11),
	idperiodoacademico int(11),
	primary key(idportafoliodocente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table portafolioestado(
	idportafolioestado int(11) not null auto_increment,
	nombre varchar(50),
	primary key(idportafolioestado)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

