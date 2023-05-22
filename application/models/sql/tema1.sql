
use educayso_facae;
drop view tema1;
create view tema1 as select  tema.idtema,tema.nombrecorto,tema.nombrelargo, tema.numerosesion,unidadsilabo.idunidadsilabo,unidadsilabo.nombre as launidadsilabo,unidadsilabo.unidad,silabo.idsilabo, silabo.nombre as elsilabo,tema.duracionminutos,tema.idvideotutorial,videotutorial.idreactivo,sesionevento.idmodoevaluacion  from tema, unidadsilabo, silabo,videotutorial,sesionevento where tema.idunidadsilabo=unidadsilabo.idunidadsilabo and unidadsilabo.idsilabo=silabo.idsilabo and tema.idvideotutorial=videotutorial.idvideotutorial and tema.idtema=sesionevento.idtema
UNION

select tema.idtema,tema.nombrecorto,tema.nombrelargo, tema.numerosesion,unidadsilabo.idunidadsilabo,unidadsilabo.nombre as launidadsilabo,unidadsilabo.unidad,silabo.idsilabo, silabo.nombre as elsilabo,tema.duracionminutos,tema.idvideotutorial,0 as idreactivo,sesionevento.idmodoevaluacion  from tema, unidadsilabo, silabo,videotutorial,sesionevento where tema.idunidadsilabo=unidadsilabo.idunidadsilabo and unidadsilabo.idsilabo=silabo.idsilabo and tema.idvideotutorial=0 and tema.idtema=sesionevento.idtema;
