
use educayso_facae;
drop view periodoacademico1;
create view periodoacademico1 as select peac.idperiodoacademico,depa.iddepartamento,  concat(COALESCE(depa.iniciales,'')," - ", COALESCE(peac.nombrecorto,'')) as elperiodoacademico  from periodoacademico peac,departamento depa,departamentoperiodoacademico depe where peac.idperiodoacademico=depe.idperiodoacademico and depe.iddepartamento=depa.iddepartamento
UNION

select peac.idperiodoacademico,0 as iddepartamento,  concat("GENERAL"," - ", COALESCE(peac.nombrecorto,'')) as elperiodoacademico  from periodoacademico peac,departamento depa where peac.idperiodoacademico not in (select idperiodoacademico from departamentoperiodoacademico);
