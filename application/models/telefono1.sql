
use educayso_facae;

create view telefono1 as select telefono.idtelefono,telefono.numero as numero,  concat(persona.apellidos,"  ",persona.nombres) as lapersona  from telefono,persona  where telefono.idpersona=persona.idpersona ;
