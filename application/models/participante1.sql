
use educayso_facae;
drop view participante1;
create view participante1 as select participante.idevento,participante.idpersona,concat(persona.apellidos," ",persona.nombres) as nombres from participante,persona where participante.idpersona=persona.idpersona;
