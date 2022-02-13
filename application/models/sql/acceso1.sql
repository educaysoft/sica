
use educayso_facae;

drop view acceso1;
create view acceso1 as select usuario.idusuario, acceso.idacceso,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')," : ",COALESCE(usuario.email)) as elusuario, acceso.idmodulo as idmodulo, modulo.nombre as elmodulo, acceso.idnivelacceso, nivelacceso.nombre as elnivelacceso from acceso, usuario, persona,  modulo,nivelacceso  where acceso.idusuario=usuario.idusuario and usuario.idpersona = persona.idpersona and acceso.idmodulo= modulo.idmodulo and acceso.idnivelacceso=nivelacceso.idnivelacceso;
