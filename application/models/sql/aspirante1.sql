
use educayso_facae;

create view aspirante1 as select aspirante.idaspirante,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elaspirante, aspirante.iddepartamento as iddepartamento, departamento.nombre as lacarrera, aspirante.fechadesde, aspirante.fechahasta from aspirante,persona,departamento  where aspirante.idpersona=persona.idpersona and aspirante.iddepartamento=departamento.iddepartamento ;
