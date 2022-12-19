
use educayso_facae;
drop view asignaturadocente1;
create view asignaturadocente1 as select asdo.idasignaturadocente , asdo.iddistributivodocente, hodo.iddocente,concat(COALESCE(peac.nombrecorto,'')," - ", COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as eldistributivodocente, hodo.idperiodoacademico,asig.nombre as laasignatura, para.nombre as paralelo  from asignaturadocente asdo, distributivodocente hodo, periodoacademico peac, docente doce, persona pers,asignatura asig,paralelo para  where asdo.iddistributivodocente=hodo.iddistributivodocente and hodo.iddocente=doce.iddocente and doce.idpersona=pers.idpersona and hodo.idperiodoacademico=peac.idperiodoacademico and asdo.idasignatura=asig.idasignatura and asdo.idparalelo=para.idparalelo ;
