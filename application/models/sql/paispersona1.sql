
use educayso_facae;

create view paispersona1 as select paispersona.idpaispersona, paispersona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as lapersona,pais.nombre as lapais 
	from paispersona,persona,pais  where paispersona.idpais=pais.idpais and paispersona.idpersona=persona.idpersona;
