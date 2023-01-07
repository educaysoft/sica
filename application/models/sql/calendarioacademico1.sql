
use educayso_facae;
drop view calendarioacademico1;
create view calendarioacademico1 as select calendarioacademico.idcalendarioacademico,calendarioacademico.idperiodoacademico,concat(departamento.iniciales," - ",periodoacademico.nombrecorto) as elcalendarioacademico from calendarioacademico, periodoacademico,departamento where calendarioacademico.idperiodoacademico=periodoacademico.idperiodoacademico and calendarioacademico.iddepartamento=departamento.iddepartamento ;
