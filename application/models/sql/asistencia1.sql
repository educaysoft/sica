
use educayso_facae;
drop view asistencia1;
create view asistencia1 as select asistencia.idasistencia,asistencia.idevento,evento.titulo as elevento,asistencia.idpersona,concat(persona.apellidos," ",persona.nombres," -  ",COALESCE(tipoasistencia.nombre)) as lapersona,asistencia.fecha,tipoasistencia.idtipoasistencia, tipoasistencia.nombre as tipoasistencia,asistencia.comentario,hora from asistencia,persona,evento,tipoasistencia where asistencia.idpersona=persona.idpersona and asistencia.idevento=evento.idevento and asistencia.idtipoasistencia=tipoasistencia.idtipoasistencia;
