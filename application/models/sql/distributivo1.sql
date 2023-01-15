use educayso_facae;
drop view distributivo1;
create view distributivo1 as select dist.iddistributivo,depa.iddepartamento, dist.idperiodoacademico, peac.nombrecorto as elperiodoacademico, concat(COALESCE(depa.iniciales,'')," - ", COALESCE(peac.nombrecorto,'')) as eldistributivo  from distributivo dist,departamento depa,periodoacademico peac where dist.iddepartamento=depa.iddepartamento and dist.idperiodoacademico=peac.idperiodoacademico ;
