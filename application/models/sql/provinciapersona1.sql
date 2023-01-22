
use educayso_facae;
create view provinciapersona1 as select provinciapersona.idprovinciapersona, provinciapersona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as lapersona,provincia.nombre as laprovincia 
	from provinciapersona,persona,provincia  where provinciapersona.idprovincia=provincia.idprovincia and provinciapersona.idpersona=persona.idpersona;
