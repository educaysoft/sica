
use educayso_facae;
drop view pagador1;
create view pagador1 as select pagador.idpagador, pagador.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elpagador from pagador,persona  where pagador.idpersona=persona.idpersona;
