
use educayso_facae;

create view nacionalidadpersona1 as select nacionalidadpersona.idnacionalidadpersona, nacionalidadpersona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as lapersona,nacionalidad.nombre as lanacionalidad 
	from nacionalidadpersona,persona,nacionalidad  where nacionalidadpersona.idnacionalidad=nacionalidad.idnacionalidad and nacionalidadpersona.idpersona=persona.idpersona;
