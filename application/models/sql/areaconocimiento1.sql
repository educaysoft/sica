
use educayso_facae;
create view areaconocimiento1 as select arco.idareaconocimiento,arco.nombre, (select count(asig.idasignatura) from asignatura asig where asig.idareaconocimiento=arco.idareaconocimiento) as numeasig from areaconocimiento arco;
