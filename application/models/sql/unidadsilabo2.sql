use educayso_facae;
create view unidadsilabo2 as select unidadsilabo.idunidadsilabo,unidadsilabo.idsilabo,silabo.nombre as elsilabo,unidadsilabo.unidad,unidadsilabo.nombre as launidad,"unknow" as sesiones  from unidadsilabo,silabo where  unidadsilabo.idsilabo=silabo.idsilabo;
