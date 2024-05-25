use educayso_facae;
drop view asignaturadocente1;
create view asignaturadocente1 as select asdo.idasignaturadocente ,dist.iddistributivo, asdo.iddistributivodocente,pers.idpersona, dido.iddocente,concat(COALESCE(peac.nombrecorto,'')," - ", COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as eldistributivodocente, dist.idperiodoacademico,peac.nombrecorto as elperiodoacademico,asig.idasignatura,concat(COALESCE(arco.nombre,'')," - ",COALESCE(mall.nombrecorto,'')," - ",COALESCE(asig.nombre,'')) as laasignatura,para.idparalelo, para.nombre as paralelo,niac.numero as numeronivel,niac.idnivelacademico, niac.nombre as nivel,(select round(sum(jodo.duracionminutos)/60,1) from jornadadocente jodo where jodo.idasignaturadocente=asdo.idasignaturadocente) as horas,(select hoas.cantidad from horasasignatura hoas where hoas.idasignatura=asig.idasignatura and hoas.idtipohorasasignatura=1 limit 1) as hpdo, (select hoas.cantidad from horasasignatura hoas where hoas.idasignatura=asig.idasignatura and hoas.idtipohorasasignatura=2 limit 1) as hpra,esad.nombre as estado,esad.idestadoasignaturadocente  from asignaturadocente asdo,malla mall,distributivo dist, distributivodocente0 dido, periodoacademico peac, docente doce, persona pers,asignatura asig,paralelo para,nivelacademico niac,areaconocimiento arco,estadoasignaturadocente esad  
where dido.iddistributivo=dist.iddistributivo 
and asdo.iddistributivodocente=dido.iddistributivodocente 
and dido.iddocente=doce.iddocente 
and doce.idpersona=pers.idpersona 
and dist.idperiodoacademico=peac.idperiodoacademico 
and asdo.idasignatura=asig.idasignatura 
and asdo.idparalelo=para.idparalelo 
and asig.idnivelacademico=niac.idnivelacademico 
and asig.idmalla=mall.idmalla 
and asig.idareaconocimiento=arco.idareaconocimiento 
and asdo.idestadoasignaturadocente=esad.idestadoasignaturadocente;
