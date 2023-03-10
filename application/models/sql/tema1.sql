
use educayso_facae;
drop view tema1;
create view tema1 as select  tema.idtema,tema.nombrecorto, tema.numerosesion,unidadsilabo.idunidadsilabo,unidadsilabo.nombre as launidadsilabo,unidadsilabo.unidad,silabo.idsilabo, silabo.nombre as elsilabo,tema.duracionminutos,tema.idvideotutorial,videotutorial.idevaluacion  from tema, unidadsilabo, silabo,videotutorial where tema.idunidadsilabo=unidadsilabo.idunidadsilabo and unidadsilabo.idsilabo=silabo.idsilabo and tema.idvideotutorial=videotutorial.idvideotutorial;
