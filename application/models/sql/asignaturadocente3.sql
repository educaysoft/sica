
use educayso_facae;
drop view asignaturadocente3;
create view asignaturadocente3 as select asdo.idasignaturadocente ,dist.iddistributivo, asdo.iddistributivodocente,pers.cedula,pers.idpersona,(select corr.nombre from correo corr where corr.idpersona=pers.idpersona and idcorreo_estado=1 limit 1) as correo, hodo.iddocente,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as eldocente, dist.idperiodoacademico,peac.nombrecorto as elperiodoacademico,asig.idasignatura,arco.idareaconocimiento, arco.nombre as area, concat(COALESCE(asig.nombre,'')) as laasignatura,para.idparalelo, para.nombre as paralelo,niac.nombre as nivel,(select round(sum(jodo.duracionminutos)/60,1) from jornadadocente jodo where jodo.idasignaturadocente=asdo.idasignaturadocente) as horas,esad.nombre as estado,esad.idestadoasignaturadocente,even.idevento,even.fechainicia,even.fechafinaliza  from asignaturadocente asdo,distributivo dist, distributivodocente0 hodo, periodoacademico peac, docente doce, persona0 pers,asignatura asig,paralelo para,nivelacademico niac,areaconocimiento arco,estadoasignaturadocente esad,evento even  where hodo.iddistributivo=dist.iddistributivo and asdo.iddistributivodocente=hodo.iddistributivodocente and hodo.iddocente=doce.iddocente and doce.idpersona=pers.idpersona and dist.idperiodoacademico=peac.idperiodoacademico and asdo.idasignatura=asig.idasignatura and asdo.idparalelo=para.idparalelo and asig.idnivelacademico=niac.idnivelacademico and asig.idareaconocimiento=arco.idareaconocimiento and asdo.idestadoasignaturadocente=esad.idestadoasignaturadocente and even.idasignaturadocente=asdo.idasignaturadocente;
