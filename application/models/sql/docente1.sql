
use educayso_facae;
drop view docente1;
create view docente1 as select doce.iddocente,pers.idpersona,pers.cedula,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as eldocente   from docente0 doce,persona0 pers  where doce.idpersona=pers.idpersona;
