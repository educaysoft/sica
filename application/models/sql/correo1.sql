
use educayso_facae;
drop view correo1;
create view correo1 as select correo.idcorreo,correo.nombre as elcorreo,correo.idpersona, concat(persona.apellidos,"  ",persona.nombres) as lapersona,correo.idcorreo_estado,correo_estado.nombre as elestado  from correo,persona,correo_estado  where correo.idpersona=persona.idpersona and correo.idcorreo_estado=correo_estado.idcorreo_estado;
