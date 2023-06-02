
use educayso_facae;

create view pagador1 as select pagador.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elpagador from pagador,persona  where pagador.idpersona=persona.idpersona;
