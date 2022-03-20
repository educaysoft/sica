
use educayso_facae;

create view participante1 as select participante.idparticipante,participante.idevento,participante.idpersona,concat(persona.apellidos," ",persona.nombres) as nombres,participante.iddocumento from participante,persona where participante.idpersona=persona.idpersona;
