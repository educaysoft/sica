use educayso_facae;
create view documentoevento1 as select documentoevento.iddocumentoevento,documentoevento.idevento,evento.titulo as elevento,documentoevento.iddocumento, documento.asunto as eldocumento from documentoevento,documento,evento where documentoevento.iddocumento=documento.iddocumento and documentoevento.idevento=evento.idevento;
