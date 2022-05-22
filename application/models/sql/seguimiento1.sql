
use educayso_facae;

create view seguimiento1 as select seguimiento.idseguimiento,seguimiento.idevento,evento.titulo as elevento,seguimiento.idpersona,concat(persona.apellidos," ",persona.nombres," -  ",COALESCE(tiposeguimiento.nombre)) as lapersona,seguimiento.fecha,tiposeguimiento.idtiposeguimiento, tiposeguimiento.nombre as tiposeguimiento,seguimiento.comentario from seguimiento,persona,evento,tiposeguimiento where seguimiento.idpersona=persona.idpersona and seguimiento.idevento=evento.idevento and seguimiento.idtiposeguimiento=tiposeguimiento.idtiposeguimiento;
