
use educayso_facae;
create view alumno1 as select alumno.idalumno,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elalumno  from alumno,persona  where alumno.idpersona=persona.idpersona;
