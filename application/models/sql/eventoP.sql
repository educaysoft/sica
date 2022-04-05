
use educayso_facae;
drop view eventoP; 
create view eventoP as select evento.idevento,evento.titulo,evento.detalle,evento.fechacreacion,evento.fechafinaliza,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elparticipante,participante.idparticipante,participante.iddocumento as iddocumento2,evento_estado.nombre as estado,institucion.nombre as lainstitucion,certificado.iddocumento,certificado.idtipodocu,certificado.posi_nomb_x as posix,certificado.posi_nomb_y as posiy,documento.archivopdf,documento.idordenador,ordenador.nombre as elordenador,documento.iddirectorio,directorio.ruta from evento,evento_estado,institucion,participante,persona,certificado,documento,ordenador,directorio where evento.idevento_estado=evento_estado.idevento_estado and evento.idinstitucion=institucion.idinstitucion and participante.idevento=evento.idevento and participante.idpersona=persona.idpersona and evento.idevento=certificado.idevento and certificado.iddocumento=documento.iddocumento and documento.idordenador=ordenador.idordenador and documento.iddirectorio=directorio.iddirectorio;
