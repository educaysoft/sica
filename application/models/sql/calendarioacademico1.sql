
use educayso_facae;
drop view calendarioacademico1;
create view calendarioacademico1 as select calendarioacademico.idcalendarioacademico,calendarioacademico.nombre,calendarioacademico.fechadesde,calendarioacademico.fechahasta,calendarioacademico.idperiodoacademico,concat("calendario"," - ",periodoacademico.nombrecorto) as elcalendarioacademico from calendarioacademico, periodoacademico where calendarioacademico.idperiodoacademico=periodoacademico.idperiodoacademico; 

