use educayso_facae;
drop view vinculopersona1;
create view vinculopersona1 as select vinculopersona.idvinculopersona,vinculopersona.idpersona,concat(persona0.apellidos," ",persona0.nombres) as lapersona1,relacionpersona1.lapersona,relacionpersona1.idpersona as idpersona2,relacionpersona1.larelacion,vinculopersona.fechadesde,vinculopersona.fechahasta from vinculopersona,relacionpersona1,persona0 where vinculopersona.idrelacionpersona=relacionpersona1.idrelacionpersona and vinculopersona.idpersona=persona0.idpersona;
