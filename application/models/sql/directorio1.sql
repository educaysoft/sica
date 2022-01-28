
use educayso_facae;

create view directorio1 as select directorio.iddirectorio,  directorio.nombre,directorio.ruta, directorio.descripcion,ordenador.nombre as elordenador  from directorio,ordenador  where directorio.idordenador=ordenador.idordenador ;
