
use educayso_facae;

drop view evento1;
create view evento1 as select evento.idevento,evento.titulo,evento.detalle,evento.fechacreacion,evento.fechainicia,evento.fechafinaliza,evento_estado.nombre as estado,institucion.nombre as lainstitucion from evento,evento_estado,institucion where evento.idevento_estado=evento_estado.idevento_estado and evento.idinstitucion=institucion.idinstitucion;
