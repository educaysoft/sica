
use educayso_facae;

create view fechaevento1 as select fechaevento.idfechaevento,  fechaevento.fecha,fechaevento.tema, evento.titulo as elevento  from fechaevento,evento  where fechaevento.idevento=evento.idevento;
