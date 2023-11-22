
use educayso_facae;
create view departamentofuente1 as select departamentofuente.iddepartamentofuente,departamentofuente.iddepartamento,departamento.nombre as eldepartamento   from departamentofuente,departamento  where  departamentofuente.iddepartamento=departamento.iddepartamento;
