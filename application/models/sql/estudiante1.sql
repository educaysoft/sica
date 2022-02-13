
use educayso_facae;

drop view estudiante1;
create view estudiante1 as select estudiante.idestudiante,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elestudiante, estudiante.iddepartamento as iddepartamento, departamento.nombre as lacarrera, estudiante.fechadesde, estudiante.fechahasta from estudiante,persona,departamento  where estudiante.idpersona=persona.idpersona and estudiante.iddepartamento=departamento.iddepartamento ;
