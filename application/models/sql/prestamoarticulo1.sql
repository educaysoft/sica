
use educayso_facae;
create view prestamoarticulo1 as select prestamoarticulo.idprestamoarticulo,prestamoarticulo.idarticulo,prestamoarticulo.idpersona,prestamoarticulo.detalle,prestamoarticulo.fechaprestamo,prestamoarticulo.horaprestamo,prestamoarticulo.fechadevolucion,prestamoarticulo.horadevolucion,articulo.nombre as elarticulo ,  concat(persona.apellidos,"  ",persona.nombres) as lapersona from prestamoarticulo,articulo,persona where prestamoarticulo.idarticulo=articulo.idarticulo and prestamoarticulo.idpersona=persona.idpersona;
