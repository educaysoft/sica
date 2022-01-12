
use educayso_facae;


create view articulo1 as select articulo.idarticulo, articulo.idinstitucion as idinstitucion, institucion.nombre as lainstitucion, articulo.nombre from articulo,institucion  where  articulo.idinstitucion=institucion.idinstitucion ;
