use educayso_facae;
drop view unidadsilabo1;
create view unidadsilabo1 as select unidadsilabo.idunidadsilabo,unidadsilabo.idsilabo,silabo.nombre,unidadsilabo.unidad,unidadsilabo.nombre as launidad,(select count(idtema) from tema where tema.idunidadsilabo=unidadsilabo.idunidadsilabo) as sesiones  from unidadsilabo,silabo where  unidadsilabo.idsilabo=silabo.idsilabo;
