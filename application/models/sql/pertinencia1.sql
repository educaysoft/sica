use educayso_facae;
drop view pertinencia1; 
create view pertinencia1 as select pertinencia.idpertinencia, pertinencia.iddepartamento, pertinencia.idestudio,estudio.idpersona,(select persona.apellidos  from persona where persona.idpersona=estudio.idpersona) as apellidos,(select persona.nombres  from persona where persona.idpersona=estudio.idpersona) as nombres, estudio.titulo , departamento.nombre as eldepartamento from pertinencia,estudio,departamento  where pertinencia.iddepartamento=departamento.iddepartamento and pertinencia.idestudio=estudio.idestudio;
