
use educayso_facae;

create view cinturon1 as select cinturon.idcinturon,cinturon.color, articulo.nombre as elarticulo  from cinturon,articulo  where cinturon.idarticulo=articulo.idarticulo;
