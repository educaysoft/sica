
use educayso_facae;
drop view estudio1;
create view estudio1 as select estudio.idestudio,persona.idpersona,persona.cedula,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as lapersona, estudio.idinstitucion as idinstitucion, institucion.nombre as lainstitucion, estudio.nivel, estudio.titulo from estudio,persona,institucion  where estudio.idpersona=persona.idpersona and estudio.idinstitucion=institucion.idinstitucion ;
