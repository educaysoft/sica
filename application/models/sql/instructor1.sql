
use educayso_facae;

create view instructor1 as select instructor.idinstructor,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elinstructor  from instructor,persona  where instructor.idpersona=persona.idpersona  ;
