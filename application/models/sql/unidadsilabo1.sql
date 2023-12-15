use educayso_facae;
drop view unidadsilabo1;
create view unidadsilabo1 as select unidadsilabo.idunidadsilabo,unidadsilabo.idsilabo,silabo.nombre as elsilabo,unidadsilabo.unidad,unidadsilabo.nombre as launidad,(select count(tema.idtema) from tema0 tema where tema.idunidadsilabo=unidadsilabo.idunidadsilabo) as sesiones  from unidadsilabo,silabo where  unidadsilabo.idsilabo=silabo.idsilabo;
