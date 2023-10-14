use educayso_facae;
create table  miembroareaacademica(idmiembroareaacademica int(11) not null primary key auto_increment,idperiodoacademico int(11), idareaacademica int(11), idpersona int(11), fechadesde date,fechahasta date, 
	foreign key(idpersona) REFERENCES persona(idpersona),
	foreign key(idperiodoacademico) REFERENCES periodoacademico(idperiodoacademico),
	foreign key(idareaacademica) REFERENCES areaacademica(idareaacademica));



