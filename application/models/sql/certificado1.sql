
use educayso_facae;
create view certificado1 as select certificado.idcertificado,certificado.archivo,certificado.propietario,certificado.iddocumento,documento.asunto as eldocumento, evento.titulo as elevento from certificado,documento,evento where certificado.iddocumento=documento.iddocumento and certificado.idevento=evento.idevento;
