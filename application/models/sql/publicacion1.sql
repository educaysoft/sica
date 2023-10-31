
use educayso_facae;
create view publicacion1 as select publicacion.idpublicacion,publicacion.titulo,publicacion.fechapublicacion,tipopublicacion.idtipopublicacion, tipopublicacion.nombre as tipo,publicacion.url  from publicacion,tipopublicacion where publicacion.idtipopublicacion=tipopublicacion.idtipopublicacion;
