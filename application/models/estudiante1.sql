
use educayso_facae;


create view estudiante1 as select estudiante.idestudiante,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elestudiante, estudiante.idinstitucion as idinstitucion, institucion.nombre as lainstitucion, estudiante.fechainscripcion as fechainscripcion from estudiante,persona,institucion  where estudiante.idpersona=persona.idpersona and estudiante.idinstitucion=institucion.idinstitucion ;
