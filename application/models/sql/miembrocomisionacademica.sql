use educayso_facae;
drop table miembrocomisionacademica;
create table  miembrocomisionacademica(idmiembrocomisionacademica int(11) not null primary key auto_increment,idperiodoacademico int(11), idcomisionacademica int(11), idpersona int(11), fechadesde date,fechahasta date, 
	foreign key(idpersona) REFERENCES persona(idpersona),
	foreign key(idperiodoacademico) REFERENCES periodoacademico(idperiodoacademico),
	foreign key(idcomisionacademica) REFERENCES comisionacademica(idcomisionacademica));



