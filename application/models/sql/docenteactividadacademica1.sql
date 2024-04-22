use educayso_facae;
drop view docenteactividadacademica1;
create view  docenteactividadacademica1 as select doac.iddocenteactividadacademica, acac.idactividadacademica,dido.iddistributivodocente,dido.eldistributivodocente, acac.nombre as nombreactividad,acac.item,acac.idtipoactividadacademica,tiac.nombre as tipoactividad,doac.numerohoras,doac.detalle,  (select sum(minutosocupados)/60 from documentoportafolio dofo where dofo.iddocenteactividadacademica=doac.iddocenteactividadacademica) as horasocupadas,dido.iddocente   from docenteactividadacademica doac, actividadacademica acac,tipoactividadacademica tiac,distributivodocente1 as dido where doac.idactividadacademica=acac.idactividadacademica and acac.idtipoactividadacademica=tiac.idtipoactividadacademica and doac.iddistributivodocente=dido.iddistributivodocente;


