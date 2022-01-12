
use educayso_facae;

create view correo1 as select correo.idcorreo,correo.nombre as elcorreo, concat(persona.apellidos,"  ",persona.nombres) as lapersona  from correo,persona  where correo.idpersona=persona.idpersona;
