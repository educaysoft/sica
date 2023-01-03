
use educayso_facae;
drop view distributivodocente1;
create view distributivodocente1 as select dido.iddistributivodocente,dido.iddocente, concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as eldocente, dido.idperiodoacademico, peac.nombrecorto as elperiodoacademico, concat(COALESCE(peac.nombrecorto,'')," - ", COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as eldistributivodocente, (select count(asdo.idasignaturadocente) from asignaturadocente asdo where asdo.iddistributivodocente=dido.iddistributivodocente) as numeasig    from distributivodocente dido, periodoacademico peac, docente doce, persona pers where dido.iddocente=doce.iddocente and doce.idpersona=pers.idpersona and dido.idperiodoacademico=peac.idperiodoacademico ;
