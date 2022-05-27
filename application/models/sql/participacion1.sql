
use educayso_facae;
drop view participacion1;
create view participacion1 as select participacion.idparticipacion,participacion.idevento,participacion.fecha,participacion.porcentaje,participacion.ayuda,participacion.idpersona,concat(persona.apellidos," ",persona.nombres) as nombres,participacion.comentario from participacion,persona where participacion.idpersona=persona.idpersona;
