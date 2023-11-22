
use educayso_facae;
create view departamentodestino1 as select departamentodestino.iddepartamentodestino,departamentodestino.iddepartamento,departamento.nombre as eldepartamento   from departamentodestino,departamento  where  departamentodestino.iddepartamento=departamento.iddepartamento;
