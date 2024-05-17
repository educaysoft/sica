
use educayso_facae;
create view asignaturadocente4 as select asdo.idasignaturadocente ,dist.iddistributivo, asdo.iddistributivodocente,pers.cedula,pers.idpersona,(select corr.nombre from correo corr where corr.idpersona=pers.idpersona and idcorreo_estado=1 limit 1) as correo, hodo.iddocente,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as eldocente, dist.idperiodoacademico,peac.nombrecorto as elperiodoacademico,asig.idasignatura,asig.contenidosminimos,arco.idareaconocimiento, arco.nombre as area, concat(COALESCE(asig.nombre,'')) as laasignatura,para.idparalelo, para.nombre as paralelo,niac.numero as numeronivelacademico, niac.nombre as nivel,(select round(sum(jodo.duracionminutos)/60,1) from jornadadocente jodo where jodo.idasignaturadocente=asdo.idasignaturadocente) as horas,esad.nombre as estado,esad.idestadoasignaturadocente,even.idevento,even.fechainicia,even.fechafinaliza,(select eves.nombre from evento_estado eves where eves.idevento_estado=even.idevento_estado) as estadoevento, (select docu.archivopdf from documento docu where docu.iddocumento=sila.iddocumento) as archivopdf, (select count(tema.idtema) from tema1 tema where tema.idsilabo=sila.idsilabo) as cantidadtemas, (select docu.archivopdf from documento docu, documentoevento doev where docu.iddocumento=doev.iddocumento and doev.idevento=even.idevento and doev.idtipodocu=47 limit 1 ) as reactivo1pdf,(select docu.archivopdf from documento docu, documentoevento doev where docu.iddocumento=doev.iddocumento and doev.idevento=even.idevento and doev.idtipodocu=56 limit 1 ) as reactivo2pdf,(select docu.archivopdf from documento docu, documentoevento doev where docu.iddocumento=doev.iddocumento and doev.idevento=even.idevento and doev.idtipodocu=40 limit 1 ) as calificacion1pdf,(select docu.archivopdf from documento docu, documentoevento doev where docu.iddocumento=doev.iddocumento and doev.idevento=even.idevento and doev.idtipodocu=57 limit 1 ) as calificacion2pdf, (select docu.archivopdf from documento docu, documentoevento doev where docu.iddocumento=doev.iddocumento and doev.idevento=even.idevento and doev.idtipodocu=38 limit 1 ) as planpdf, (select estu.titulo from estudio estu where estu.idpersona=pers.idpersona and estu.idnivelestudio=4) as maestria  from asignaturadocente asdo,distributivo dist, distributivodocente0 hodo, periodoacademico peac, docente doce, persona0 pers,asignatura asig,paralelo para,nivelacademico niac,areaconocimiento arco,estadoasignaturadocente esad,evento0 even, silabo sila  where hodo.iddistributivo=dist.iddistributivo and asdo.iddistributivodocente=hodo.iddistributivodocente and hodo.iddocente=doce.iddocente and doce.idpersona=pers.idpersona and dist.idperiodoacademico=peac.idperiodoacademico and asdo.idasignatura=asig.idasignatura and asdo.idparalelo=para.idparalelo and asig.idnivelacademico=niac.idnivelacademico and asig.idareaconocimiento=arco.idareaconocimiento and asdo.idestadoasignaturadocente=esad.idestadoasignaturadocente and even.idasignaturadocente=asdo.idasignaturadocente and even.idsilabo=sila.idsilabo;
