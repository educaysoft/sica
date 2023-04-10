
use educayso_facae;


create view visitante1 as select visitante.idvisitante,visitante.idpersona, concat(persona.apellidos,"  ",persona.nombres) as lapersona,visitante.iddepartamento, departamento.nombre as eldepartamento,visitante.motivo,visitante.rutafirma,visitante.fecha,visitante.hora from visitante,persona,departamento  where visitante.idpersona=persona.idpersona and visitante.iddepartamento=departamento.iddepartamento ;
