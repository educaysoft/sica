
use educayso_facae;
drop view ubicaciontramite1;
create view ubicaciontramite1 as select ubicaciontramite.idubicaciontramite,ubicaciontramite.idtramite,ubicaciontramite.idpersona,ubicaciontramite.detalle,ubicaciontramite.fecha,ubicaciontramite.hora,tramite.nombre as eltramite ,  concat(persona.apellidos,"  ",persona.nombres) as lapersona,departamento.nombre as eldepartamento from ubicaciontramite,tramite,persona,departamento where ubicaciontramite.idtramite=tramite.idtramite and ubicaciontramite.idpersona=persona.idpersona and ubicaciontramite.iddepartamento=departamento.iddepartamento;
