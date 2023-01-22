
use educayso_facae;
drop view paispersona1;
create view paispersona1 as select paispersona.idpaispersona, paispersona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as lapersona,pais.nombre as elpais 
	from paispersona,persona,pais  where paispersona.idpais=pais.idpais and paispersona.idpersona=persona.idpersona;
