
use educayso_facae;
drop view matricula1;
create view matricula1 as select matricula.idmatricula,matricula.idalumno,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elalumno,matricula.iddepartamento,departamento.nombre as eldepartamento,(select niac.nombre from nivelacademico niac where niac.idnivelacademico= matricula.idnivelacademico) as nivelacademico,matricula.idperiodoacademico,periodoacademico.nombrecorto as elperiodo, (select tima.nombre from tipomatricula tima where tima.idtipomatricula=matricula.idtipomatricula) as eltipomatricula  from matricula,persona,departamento,alumno,periodoacademico  where matricula.idalumno=alumno.idalumno and alumno.idpersona=persona.idpersona and matricula.iddepartamento=departamento.iddepartamento and matricula.idperiodoacademico=periodoacademico.idperiodoacademico;