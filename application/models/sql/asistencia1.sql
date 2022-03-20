
use educayso_facae;

create view asistencia1 as select asistencia.idasistencia,asistencia.idevento,evento.titulo as elevento,asistencia.idpersona,concat(persona.apellidos," ",persona.nombres) as lapersona,asistencia.fecha, tipoasistencia.nombre as tipoasistencia from asistencia,persona,evento,tipoasistencia where asistencia.idpersona=persona.idpersona and asistencia.idevento=evento.idevento and asistencia.idtipoasistencia=tipoasistencia.idtipoasistencia;
