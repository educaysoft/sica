
use educayso_facae;
create view tema1 as select  tema.idtema,tema.nombrecorto,tema.nombrelargo, tema.numerosesion,unsi.idunidadsilabo,unsi.nombre as launidadsilabo,unsi.unidad,sila.idsilabo, sila.nombre as elsilabo,tema.duracionminutos,tema.idvideotutorial,vitu.idreactivo, tema.idmodoevaluacion   from tema0 tema, unidadsilabo unsi, silabo sila,videotutorial vitu where tema.idunidadsilabo=unsi.idunidadsilabo and unsi.idsilabo=sila.idsilabo and tema.idvideotutorial=vitu.idvideotutorial  
UNION
select tema.idtema,tema.nombrecorto,tema.nombrelargo, tema.numerosesion,unsi.idunidadsilabo,unsi.nombre as launidadsilabo,unsi.unidad,sila.idsilabo, sila.nombre as elsilabo,tema.duracionminutos,tema.idvideotutorial,0 as idreactivo, tema.idmodoevaluacion  from tema0 tema, unidadsilabo unsi, silabo sila,videotutorial vitu where tema.idunidadsilabo=unsi.idunidadsilabo and unsi.idsilabo=sila.idsilabo and tema.idvideotutorial=0;  
