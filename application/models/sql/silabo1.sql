
use educayso_facae;
drop view silabo1;
create view silabo1 as select sila.idsilabo,sila.idperiodoacademico,sila.nombre as elsilabo, peac.nombrecorto as elperiodo,asig.idasignatura, asig.nombre as laasignatura, sila.iddocente, concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,''))  as eldocente from silabo sila,periodoacademico peac, asignatura asig, persona pers, docente doce  where sila.idperiodoacademico=peac.idperiodoacademico and sila.idasignatura=asig.idasignatura and sila.iddocente=doce.iddocente and doce.idpersona=pers.idpersona ;
