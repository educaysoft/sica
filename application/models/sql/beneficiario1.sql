
use educayso_facae;

create view beneficiario1 as select beneficiario.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elbeneficiario from beneficiario,persona  where beneficiario.idpersona=persona.idpersona;
