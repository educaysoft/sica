
use educayso_facae;
drop view proceso1;
create view proceso1 as select proc.idproceso, proc.nombre as elproceso, (select concat(ubpr.detalle,"-->(",espr.nombre,")") from ubicacionproceso ubpr, estadoproceso espr where ubpr.idproceso=proc.idproceso and ubpr.idestadoproceso=espr.idestadoproceso  order by ubpr.idubicacionproceso desc limit 1) as estado from proceso proc  ;
