
use educayso_facae;
drop view silabo1;
create view silabo1 as select sila.idsilabo,sila.idperiodoacademico,sila.nombre as elsilabo, peac.nombrecorto as elperiodo,asig.idasignatura, asig.nombre as laasignatura, sila.iddocente  from silabo sila,periodoacademico peac, asignatura asig  where sila.idperiodoacademico=peac.idperiodoacademico and sila.idasignatura=asig.idasignatura ;
