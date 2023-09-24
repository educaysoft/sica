
use educayso_facae;

drop view seguimiento1;
create view seguimiento1 as select se.idseguimiento,se.idevento,ev.titulo as elevento,se.idpersona,concat(pe.apellidos," ",pe.nombres) as lapersona,se.fecha,ti.idtiposeguimiento, ti.nombre as tiposeguimiento,se.comentario,se.correopara,se.correode,se.asunto from seguimiento se,persona pe,evento ev,tiposeguimiento ti where se.idpersona=pe.idpersona and se.idevento=ev.idevento and se.idtiposeguimiento=ti.idtiposeguimiento;
