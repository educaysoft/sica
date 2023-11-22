
use educayso_facae;
create view departamentoalumno1 as select departamentoalumno.iddepartamentoalumno,departamentoalumno.idalumno,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elalumno,departamentoalumno.iddepartamento,departamento.nombre as eldepartamento,departamentoalumno.fechadesde   from departamentoalumno,persona,departamento,alumno  where departamentoalumno.idalumno=alumno.idalumno and alumno.idpersona=persona.idpersona and departamentoalumno.iddepartamento=departamento.iddepartamento;
