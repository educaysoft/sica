
use educayso_facae;


create view unidad1 as select unidad.idunidad, unidad.idinstitucion as idinstitucion, institucion.nombre as lainstitucion, unidad.nombre from unidad,institucion  where  unidad.idinstitucion=institucion.idinstitucion ;
