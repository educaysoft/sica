
use educayso_facae;

create view docente1 as select docente.iddocente,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as eldocente, docente.iddepartamento as iddepartamento, departamento.nombre as lacarrera, docente.fechadesde, docente.fechahasta from docente,persona,departamento  where docente.idpersona=persona.idpersona and docente.iddepartamento=departamento.iddepartamento ;
