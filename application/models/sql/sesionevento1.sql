
use educayso_facae;
create view sesionevento1 as select sesionevento.idsesionevento,modoevaluacion.nombre as evaluacion,  sesionevento.fecha,sesionevento.tema, evento.titulo as elevento  from sesionevento,evento,modoevaluacion  where sesionevento.idevento=evento.idevento and sesionevento.idmodoevaluacion=modoevaluacion.idmodoevaluacion;
