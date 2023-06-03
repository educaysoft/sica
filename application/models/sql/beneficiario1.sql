
use educayso_facae;
drop view beneficiario1;
create view beneficiario1 as select beneficiario.idbeneficiario, beneficiario.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elbeneficiario from beneficiario,persona  where beneficiario.idpersona=persona.idpersona;
