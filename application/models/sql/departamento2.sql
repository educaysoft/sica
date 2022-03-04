
use educayso_facae;


create view departamento2 as select de.iddepartamento, de.idunidad as idunidad, un.nombre as launidad, de.nombre,(select count(es.idestudiante) from estudiante es where es.iddepartamento=de.iddepartamento) as cantidad  from departamento de,unidad un  where  de.idunidad=un.idunidad ;
