
use educayso_facae;
create view distributivodocente1 as select hd.iddistributivodocente, hd.iddocente, concat(COALESCE(pe.apellidos,''),"  ",COALESCE(pe.nombres,'')) as eldocente, hd.idperiodoacademico, pa.nombrecorto as elperiodoacademico, concat(COALESCE(pa.nombrecorto,'')," - ", COALESCE(pe.apellidos,''),"  ",COALESCE(pe.nombres,'')) as eldistributivodocente   from distributivodocente hd, periodoacademico pa, docente do, persona pe where hd.iddocente=do.iddocente and do.idpersona=pe.idpersona and hd.idperiodoacademico=pa.idperiodoacademico ;
