
use educayso_facae;
drop view funcionario1;
create view funcionario1 as select funcionario.idfuncionario,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elfuncionario,funcionario.idcargo   from funcionario,persona  where funcionario.idpersona=persona.idpersona;
