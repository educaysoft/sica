
use educayso_facae;

create view horariodocente1 as select hd.idhorariodocente, hd.iddocente, concat(COALESCE(pe.apellidos,''),"  ",COALESCE(pe.nombres,'')) as eldocente, hd.idperiodoacademico, pa.nombrecorto  from horariodocente hd, periodoacademico pa, docente do, persona pe where hd.iddocente=do.iddocente and do.idpersona=pe.idpersona and hd.idperiodoacademico=pa.idperiodoacademico ;
