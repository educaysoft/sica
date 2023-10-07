use educayso_facae;

create table relacionpersona(idrelacionpersona int(11) not null auto_increment primary key, idpersona int(11),idtiporelacionpersona int(11) NOT NULL,
       	FOREIGN KEY (idtiporelacionpersona) REFERENCES tiporelacionpersona(idtiporelacionpersona),
       	FOREIGN KEY (idpersona) REFERENCES persona(idpersona)

);



