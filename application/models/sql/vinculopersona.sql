use educayso_facae;

create table vinculopersona(idvinculopersona int(11) not null auto_increment primary key, idpersona int(11),idrelacionpersona int(11),fechainicio date, fechafin date,
	FOREIGN KEY (idrelacionpersona) REFERENCES relacionpersona(idrelacionpersona),
	FOREIGN KEY (idpersona) REFERENCES persona(idpersona)

);



