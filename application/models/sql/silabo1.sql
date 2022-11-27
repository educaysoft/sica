
use educayso_facae;
create view silabo1 as select sila.idsilabo,sila.nombre as elsilabo, peac.nombrecorto as elperiodo, asig.nombre as laasignatura, sila.iddocente  from silabo sila,periodoacademico peac, asignatura asig  where sila.idperiodoacademico=peac.idperiodoacademico and sila.idasignatura=asig.idasignatura ;
