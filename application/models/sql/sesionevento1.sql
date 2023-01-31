
use educayso_facae;
drop view sesionevento1;
/*
create view sesionevento1 as select seev.idsesionevento,seev.idevento,moev.nombre as evaluacion,  seev.fecha,seev.tema, even.titulo as elevento,(select count(asis.idtipoasistencia) from asistencia asis where asis.idevento=seev.idevento and asis.fecha=seev.fecha and asis.idtipoasistencia=1) as puntual,(select count(asis.idtipoasistencia) from asistencia asis where asis.idevento=seev.idevento and asis.fecha=seev.fecha and asis.idtipoasistencia=2) as atrasado   from sesionevento seev,evento even,modoevaluacion moev  where seev.idevento=even.idevento and seev.idmodoevaluacion=moev.idmodoevaluacion;
*/



create view sesionevento1 as select seev.idsesionevento,seev.idevento,moev.nombre as evaluacion, seev.ponderacion, seev.fecha,seev.horainicio,seev.horafin,seev.tema, even.titulo as elevento,seev.idtema,tesi.numerosesion   from sesionevento seev,evento even,modoevaluacion moev,tema tesi  where seev.idevento=even.idevento and seev.idmodoevaluacion=moev.idmodoevaluacion and seev.idtema=tesi.idtema 


UNION

 select seev.idsesionevento,seev.idevento,moev.nombre as evaluacion,  seev.ponderacion, seev.fecha,seev.horainicio,seev.horafin,seev.tema, even.titulo as elevento,seev.idtema, " " as numerosesion   from sesionevento seev,evento even,modoevaluacion moev,tema tesi  where seev.idevento=even.idevento and seev.idmodoevaluacion=moev.idmodoevaluacion and seev.idtema is null; 
