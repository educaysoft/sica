
use educayso_facae;
drop view asistencia1;
create view asistencia1 as select asistencia.idasistencia,asistencia.idevento,evento.titulo as elevento,asistencia.idpersona,concat(persona.apellidos," ",persona.nombres) as lapersona,asistencia.fecha,tipoasistencia.idtipoasistencia, tipoasistencia.nombre as tipoasistencia,asistencia.comentario,hora from asistencia,persona,evento,tipoasistencia,participante0 where asistencia.idpersona=persona.idpersona and asistencia.idevento=evento.idevento and asistencia.idtipoasistencia=tipoasistencia.idtipoasistencia and participante0.idevento=evento.idevento and participante0.idpersona=persona.idpersona;
