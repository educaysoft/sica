use educayso_facae;
create view reactivo1 as select reac.idreactivo, reac.nombre, reac.detalle, reac.idasignatura, (select concat(arco.nombre," - ",asig.nombre) from asignatura asig,areaconocimiento arco where asig.idasignatura=reac.idasignatura and asig.idareaconocimiento=arco.idareaconocimiento) as laasignatura from reactivo reac;

