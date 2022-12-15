
use educayso_facae;

drop view destinatario1;
create view destinatario1 as select destinatario.iddocumento, destinatario.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as eldestinatario, documento.asunto from destinatario,persona,documento  where destinatario.iddocumento=documento.iddocumento and destinatario.idpersona=persona.idpersona;
