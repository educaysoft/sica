
use educayso_facae;

create view eventoP as select evento.idevento,evento.titulo,evento.detalle,evento.fechacreacion,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elparticipante,evento_estado.nombre as estado,institucion.nombre as lainstitucion from evento,evento_estado,institucion,participante,persona where evento.idevento_estado=evento_estado.idevento_estado and evento.idinstitucion=institucion.idinstitucion and participante.idevento=evento.idevento and participante.idpersona=persona.idpersona;
