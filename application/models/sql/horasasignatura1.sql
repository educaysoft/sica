
use educayso_facae;
drop view horasasignatura1;
create view horasasignatura1 as select hoas.idhorasasignatura,hoas.cantidad,hoas.idasignatura,thas.idtipohorasasignatura, thas.nombre as descripcion, (select arco.nombre from areaconocimiento arco where arco.idareaconocimiento=asig.idareaconocimiento) as area, (select ma.nombrecorto from malla ma where ma.idmalla=asig.idmalla) as malla, asig.nombre as laasignatura  from horasasignatura hoas,tipohorasasignatura thas, asignatura asig  where hoas.idtipohorasasignatura=thas.idtipohorasasignatura and hoas.idasignatura=asig.idasignatura;
