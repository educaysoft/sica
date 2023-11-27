
use educayso_facae;
drop view departamentoalumno1;
create view departamentoalumno1 as select departamentoalumno.iddepartamentoalumno,departamentoalumno.idalumno,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elalumno,departamentoalumno.iddepartamento,departamento.nombre as eldepartamento,departamentoalumno.fechadesde,departamentoalumno.idperiodoacademico,periodoacademico.nombrecorto as lacorte  from departamentoalumno,persona,departamento,alumno,periodoacademico  where departamentoalumno.idalumno=alumno.idalumno and alumno.idpersona=persona.idpersona and departamentoalumno.iddepartamento=departamento.iddepartamento and departamentoalumno.idperiodoacademico=periodoacademico.idperiodoacademico;
