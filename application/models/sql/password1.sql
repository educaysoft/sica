
use educayso_facae;
drop view password1;
create view password1 as select usuario.idusuario, password.idpassword,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')," : ",COALESCE(usuario.email)) as elusuario, password.idevento as idevento, evento.titulo as elevento,password.password, password.onoff, password.fechaon,password.fechaoff from password, usuario, persona,  evento  where password.idusuario=usuario.idusuario and usuario.idpersona = persona.idpersona and password.idevento= evento.idevento ;
