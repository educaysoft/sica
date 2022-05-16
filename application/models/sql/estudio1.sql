
use educayso_facae;

create view estudio1 as select estudio.idestudio,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elestudiante, estudio.idinstitucion as idinstitucion, institucion.nombre as lainstitucion, estudio.nivel, estudio.titulo from estudio,persona,institucion  where estudio.idpersona=persona.idpersona and estudio.idinstitucion=institucion.idinstitucion ;
