use educayso_facae;
create view  seguimientosilabo2 as select sesi.idseguimientosilabo,sesi.idevento,even.idsilabo,sila.idasignatura, asig.nombre as laasignatura, asig.codigo, sila.iddocente, concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,''))  as eldocente,crse.idcriterioseguimientosilabo,crse.nombre as elcriterioseguimientosilabo,vcss.idvalorcriterioseguimientosilabo, vcss.nombre as elvalorcriterioseguimientosilabo   from seguimientosilabo sesi, criterioseguimientosilabo crse,valorcriterioseguimientosilabo vcss,docente doce, asignatura asig, persona pers, silabo sila,evento even where sesi.idcriterioseguimientosilabo=crse.idcriterioseguimientosilabo and sesi.idvalorcriterioseguimientosilabo=vcss.idvalorcriterioseguimientosilabo and sila.iddocente=doce.iddocente and doce.idpersona=pers.idpersona and sesi.idevento=even.idevento and even.idsilabo=sila.idsilabo and  sila.idasignatura=asig.idasignatura;