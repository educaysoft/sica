use educayso_facae;

create table miembrocomisionacademica(idmiembrocomisionacademica int(11) not null auto_increment primary key, idpersona int(11),idperiodoacademico int(11), fechadesde date,fechahasta date,
foreign key (idpersona) REFERENCES persona(idpersona),
foreign key (idperiodoacademico) REFERENCES periodoacademico(idperiodoacademico)
);



