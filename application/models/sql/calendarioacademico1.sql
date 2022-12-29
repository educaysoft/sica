
use educayso_facae;
create view calendarioacademico1 as select calendarioacademico.idcalendarioacademico,calendarioacademico.idperiodoacademico,concat(institucion.iniciales," - ",periodoacademico.nombrecorto) as elcalendarioacademico from calendarioacademico, periodoacademico,institucion where calendarioacademico.idperiodoacademico=periodoacademico.idperiodoacademico and calendarioacademico.idinstitucion=institucion.idinstitucion ;
