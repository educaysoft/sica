
use educayso_facae;

drop view emisor1;
create view emisor1 as select emisor.iddocumento, emisor.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elemisor, documento.asunto from emisor,persona,documento  where emisor.iddocumento=documento.iddocumento and emisor.idpersona=persona.idpersona;
