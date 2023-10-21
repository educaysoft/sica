use educayso_facae;
create view  actividadacademica1 as select acac.idactividadacademica, acac.nombre as nombreactividad,acac.item,acac.idtipoactividadacademica,tiac.nombre as tipoactividad from actividadacademica acac,tipoactividadacademica tiac where acac.idtipoactividadacademica=tiac.idtipoactividadacademica;


