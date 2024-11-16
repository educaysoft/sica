use educayso_facae;
drop view distributivo1;
create view distributivo1 as select dist.iddistributivo,depa.iddepartamento,depa.nombre as eldepartamento, dist.idperiodoacademico, peac.nombrecorto as elperiodoacademico, concat(COALESCE(depa.iniciales,'')," - ", COALESCE(peac.nombrecorto,'')) as eldistributivo,dist.idestadodistributivo  from distributivo dist,departamento depa,periodoacademico peac where dist.iddepartamento=depa.iddepartamento and dist.idperiodoacademico=peac.idperiodoacademico ;
