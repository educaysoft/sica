
use educayso_facae;
create view asignaturadocente1 as select asdo.idasignaturadocente and asdo.idhorariodocente, hodo.iddocente,concat(peac.nombrecorto,' - ')," ", concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as elhorariodocente, hodo.idperiodoacademico  from asignaturadocente asdo, horariodocente hodo, periodoacademico peac, docente doce, persona pers  where asdo.idhorariodocente=hodo.idhorariodocente and hodo.iddocente=doce.iddocente and doce.idpersona=pers.idpersona and hodo.idperiodoacademico=peac.idperiodoacademico ;
