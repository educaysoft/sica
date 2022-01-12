
use educayso_facae;


create view cliente1 as select cliente.idcliente,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elcliente, cliente.idinstitucion as idinstitucion, institucion.nombre as lainstitucion, cliente.fechainscripcion as fechainscripcion from cliente,persona,institucion  where cliente.idpersona=persona.idpersona and cliente.idinstitucion=institucion.idinstitucion ;
