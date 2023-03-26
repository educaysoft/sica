
use educayso_facae;
create view certificado1 as select certificado.idcertificado,certificado.archivo,certificado.propietario,certificado.iddocumento,documento.asunto as eldocumento, evento.titulo as elevento, certificado.ubicacion,certificado.idevento from certificado,documento,evento where certificado.iddocumento=documento.iddocumento and certificado.idevento=evento.idevento
UNION
select certificado.idcertificado,certificado.archivo,certificado.propietario,certificado.iddocumento,''  as eldocumento,''  as elevento, certificado.ubicacion,"" as idevento from certificado where certificado.iddocumento is null and certificado.idevento is null;
