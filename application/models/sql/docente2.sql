
use educayso_facae;
drop view docente2;
create view docente2 as select es.iddocente,pe.idpersona,concat(COALESCE(pe.apellidos,''),"  ",COALESCE(pe.nombres,'')) as eldocente, es.iddepartamento as iddepartamento, de.nombre as lacarrera, (select count(em.iddocumento) from emisor em where em.idpersona=pe.idpersona) as cantidad  from docente es,persona pe,departamento de where es.idpersona=pe.idpersona and es.iddepartamento=de.iddepartamento ;
