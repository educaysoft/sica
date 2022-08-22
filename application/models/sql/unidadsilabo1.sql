
use educayso_facae;
create view unidadsilabo1 as select unidadsilabo.idunidadsilabo,unidadsilabo.idsilabo,silabo.nombre,unidadsilabo.unidad,unidadsilabo.nombre as launidad  from unidadsilabo,silabo where  unidadsilabo.idsilabo=silabo.idsilabo;
