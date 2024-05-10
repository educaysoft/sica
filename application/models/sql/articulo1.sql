
use educayso_facae;
drop view articulo1;

create view articulo1 as select arti.idarticulo, arti.nombre as elarticulo, arti.detalle, (select ubic.lapersona from ubicacionarticulo1 ubic where  ubic.idarticulo=arti.idarticulo limit 1) as elcustodio,arti.idinstitucion,inst.nombre as lainstitucion  from articulo arti,institucion inst where arti.idinstitucion=inst.idinstitucion; 
