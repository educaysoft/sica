
use educayso_facae;
create view certificado1 as select certificado.idcertificado,certificado.idevento,certificado.iddocumento,documento.asunto from certificado,documento where certificado.iddocumento=documento.iddocumento;
