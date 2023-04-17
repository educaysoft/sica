
use educayso_facae;
create view funcionario1 as select funcionario.idfuncionario,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')," - ",COALESCE(cargo.nombre,'')) as elfuncionario   from funcionario,persona,cargo  where funcionario.idpersona=persona.idpersona and funcionario.idcargo=cargo.idcargo;
