
use educayso_facae;

create view estudiante2 as select es.idestudiante,pe.idpersona,concat(COALESCE(pe.apellidos,''),"  ",COALESCE(pe.nombres,'')) as elestudiante, es.iddepartamento as iddepartamento, de.nombre as lacarrera, es.fechadesde, es.fechahasta,(select count(em.iddocumento) from emisor em where em.idpersona=pe.idpersona) as cantidad  from estudiante es,persona pe,departamento de where es.idpersona=pe.idpersona and es.iddepartamento=de.iddepartamento ;
