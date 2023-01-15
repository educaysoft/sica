
use educayso_facae;
create view periodoacademico1 as select peac.idperiodoacademico,depa.iddepartamento,  concat(COALESCE(depa.iniciales,'')," - ", COALESCE(peac.nombrecorto,'')) as elperiodoacademico  from periodoacademico peac,departamento depa where peac.iddepartamento=depa.iddepartamento
UNION

select peac.idperiodoacademico,depa.iddepartamento,  concat("GENERAL"," - ", COALESCE(peac.nombrecorto,'')) as elperiodoacademico  from periodoacademico peac,departamento depa where peac.iddepartamento=0;
