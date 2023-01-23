
use educayso_facae;
create view ubicacionarticulo1 as select ubicacionarticulo.idubicacionarticulo,ubicacionarticulo.idarticulo,ubicacionarticulo.idpersona,ubicacionarticulo.detalle,ubicacionarticulo.fecha,articulo.nombre as elarticulo ,  concat(persona.apellidos,"  ",persona.nombres) as lapersona,unidad.nombre as launidad from ubicacionarticulo,articulo,persona,unidad where ubicacionarticulo.idarticulo=articulo.idarticulo and ubicacionarticulo.idpersona=persona.idpersona and ubicacionarticulo.idunidad=unidad.idunidad;
