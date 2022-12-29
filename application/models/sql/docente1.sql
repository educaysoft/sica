
use educayso_facae;
drop view docente1;
create view docente1 as select docente.iddocente,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as eldocente   from docente,persona,departamento  where docente.idpersona=persona.idpersona;
