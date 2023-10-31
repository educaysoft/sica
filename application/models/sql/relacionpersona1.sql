use educayso_facae;
drop view relacionpersona1;
create view relacionpersona1 as select relacionpersona.idrelacionpersona,relacionpersona.idpersona, concat(persona0.apellidos," ",persona0.nombres) as lapersona, tiporelacionpersona.nombre as larelacion from relacionpersona, tiporelacionpersona,persona0 where relacionpersona.idtiporelacionpersona=tiporelacionpersona.idtiporelacionpersona and relacionpersona.idpersona=persona0.idpersona;
