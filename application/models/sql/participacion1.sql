
use educayso_facae;
drop view participacion1;
create view participacion1 as select participacion.idparticipacion,participacion.idevento,participacion.fecha,participacion.porcentaje,participacion.idpersona,concat(persona.apellidos," ",persona.nombres) as nombres,participacion.idtipoparticipacion,tipoparticipacion.nombre as eltipoparticipacion,participacion.comentario from participacion,persona,tipoparticipacion where participacion.idpersona=persona.idpersona and participacion.idtipoparticipacion=tipoparticipacion.idtipoparticipacion;
