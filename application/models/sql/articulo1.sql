
use educayso_facae;


create view articulo1 as select arti.idarticulo, arti.nombre as elarticulo, arti.detalle, (select ubic.lapersona from ubicacionarticulo1 ubic where  ubic.idarticulo=arti.idarticulo limit 1)  from articulo arti; 
