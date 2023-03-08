
use educayso_facae;
drop view ubicaciontramite1;
create view ubicacionproceso1 as select ubicacionproceso.idubicacionproceso,ubicacionproceso.idproceso,ubicacionproceso.idpersona,ubicacionproceso.detalle,ubicacionproceso.fecha,ubicacionproceso.hora,proceso.nombre as elproceso ,  concat(persona.apellidos,"  ",persona.nombres) as lapersona,departamento.nombre as eldepartamento,estadoproceso.nombre as estado from ubicacionproceso,proceso,persona,departamento,estadoproceso where ubicacionproceso.idproceso=proceso.idproceso and ubicacionproceso.idpersona=persona.idpersona and ubicacionproceso.iddepartamento=departamento.iddepartamento and ubicacionproceso.idestadoproceso=estadoproceso.idestadoproceso;
