
use educayso_facae;
drop view lector1;
create view lector1 as select lector.idtrabajointegracioncurricular, lector.iddocente,lector.idtipolector,persona.idpersona,persona.cedula,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as ellector, trabajointegracioncurricular.nombre from lector,docente,persona,trabajointegracioncurricular  where lector.idtrabajointegracioncurricular=trabajointegracioncurricular.idtrabajointegracioncurricular and lector.iddocente=docente.iddocente and docente.idpersona=persona.idpersona;
