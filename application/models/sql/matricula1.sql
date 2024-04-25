
use educayso_facae;
drop view matricula1;
create view matricula1 as select matricula.idmatricula,matricula.idestudiante,persona.cedula,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elestudiante,matricula.iddepartamento,departamento.nombre as eldepartamento,(select niac.nombre from nivelacademico niac where niac.idnivelacademico= matricula.idnivelacademico) as nivelacademico,matricula.idperiodoacademico,periodoacademico.nombrecorto as elperiodoacademico, (select tima.nombre from tipomatricula tima where tima.idtipomatricula=matricula.idtipomatricula) as eltipomatricula  from matricula,persona,departamento,estudiante,periodoacademico  where matricula.idestudiante=estudiante.idestudiante and estudiante.idpersona=persona.idpersona and matricula.iddepartamento=departamento.iddepartamento and matricula.idperiodoacademico=periodoacademico.idperiodoacademico;
