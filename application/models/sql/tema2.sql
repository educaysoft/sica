
use educayso_facae;
drop view tema2;
create view tema2 as select  tema.idtema,tema.nombrecorto,tema.nombrelargo, tema.numerosesion,unidadsilabo.idunidadsilabo,unidadsilabo.nombre as launidadsilabo,unidadsilabo.unidad,silabo.idsilabo, silabo.nombre as elsilabo,tema.duracionminutos,tema.idvideotutorial from tema0 tema, unidadsilabo, silabo where tema.idunidadsilabo=unidadsilabo.idunidadsilabo and unidadsilabo.idsilabo=silabo.idsilabo ; 


