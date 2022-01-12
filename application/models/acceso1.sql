
use educayso_facae;


create view acceso1 as select acceso.idacceso,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elusuario, acceso.idmodulo as idmodulo, modulo.nombre as elmodulo, acceso.idnivelacceso, nivelacceso.nombre as elnivelacceso from acceso, usuario, persona,  modulo,nivelacceso  where acceso.idusuario=usuario.idusuario and usuario.idpersona = persona.idpersona and acceso.idmodulo= modulo.idmodulo and acceso.idnivelacceso=nivelacceso.idnivelacceso;
