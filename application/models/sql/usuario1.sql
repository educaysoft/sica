
use educayso_facae;

drop view usuario1;
create view usuario1 as select usuario.idusuario,  concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elusuario, perfil.nombre as elperfil, usuario.email as email, usuario.password as password from usuario,persona,perfil  where usuario.idpersona=persona.idpersona and usuario.idperfil=perfil.idperfil ;
