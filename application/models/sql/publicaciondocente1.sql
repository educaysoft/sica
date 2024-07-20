
use educayso_facae;
create view publicaciondocente1 as select publicaciondocente.idpublicaciondocente,publicacion.idpublicacion,publicacion.titulo,publicacion.fechapublicacion,publicaciondocente.iddocente,doce.cedula,doce.eldocente as eldocente,tipopublicacion.idtipopublicacion, tipopublicacion.nombre as tipo,publicacion.url  from publicaciondocente,publicacion,tipopublicacion,docente1 doce  where publicaciondocente.idpublicacion=publicacion.idpublicacion and  publicacion.idtipopublicacion=tipopublicacion.idtipopublicacion and publicaciondocente.iddocente=doce.iddocente;
