
use educayso_facae;
drop view departamentofuncionario1;
create view departamentofuncionario1 as select departamentofuncionario.iddepartamentofuncionario,departamentofuncionario.idfuncionario,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elfuncionario,departamentofuncionario.iddepartamento,departamento.nombre as eldepartamento,departamentofuncionario.fechadesde   from departamentofuncionario,persona,departamento,funcionario  where departamentofuncionario.idfuncionario=funcionario.idfuncionario and funcionario.idpersona=persona.idpersona and departamentofuncionario.iddepartamento=departamento.iddepartamento;
