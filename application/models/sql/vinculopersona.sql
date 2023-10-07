use educayso_facae;
drop table vinculopersona;
create table vinculopersona(idvinculopersona int(11) not null auto_increment primary key, idpersona int(11),idrelacionpersona int(11),fechadesde date, fechahasta date,
	FOREIGN KEY (idrelacionpersona) REFERENCES relacionpersona(idrelacionpersona),
	FOREIGN KEY (idpersona) REFERENCES persona(idpersona)

);



