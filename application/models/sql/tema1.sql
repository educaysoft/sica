
use educayso_facae;
drop view tema1;
create view tema1 as select tema.idtema,tema.nombrecorto,unidadsilabo.idunidadsilabo,unidadsilabo.nombre as launidadsilabo,silabo.idsilabo, silabo.nombre as elsilabo  from tema, unidadsilabo, silabo where tema.idunidadsilabo=unidadsilabo.idunidadsilabo and unidadsilabo.idsilabo=silabo.idsilabo;
