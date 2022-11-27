
use educayso_facae;
drop view asignaturadocente1;
create view asignaturadocente1 as select asdo.idasignaturadocente , asdo.idhorariodocente, hodo.iddocente,concat(COALESCE(peac.nombrecorto,'')," - ", COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as elhorariodocente, hodo.idperiodoacademico,asig.nombre as laasignatura  from asignaturadocente asdo, horariodocente hodo, periodoacademico peac, docente doce, persona pers,asignatura asig  where asdo.idhorariodocente=hodo.idhorariodocente and hodo.iddocente=doce.iddocente and doce.idpersona=pers.idpersona and hodo.idperiodoacademico=peac.idperiodoacademico and asdo.idasignatura=asig.idasignatura ;
