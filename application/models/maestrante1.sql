
use educayso_facae;

drop view maestrante1;
create view maestrante1 as select maestrante.idmaestrante,persona.idpersona,persona.cedula,concat(persona.apellidos,"  ",persona.nombres) as maestrante,  maestrante_estado.idmaestrante_estado,maestrante_estado.nombre as estado,maestria.idmaestria as idmaestria,maestria.nombre as maestria,correo.nombre as correo,telefono.numero as telefono from maestrante,persona,maestrante_estado,maestria,correo,telefono  where maestrante.idpersona=persona.idpersona and maestrante.idmaestrante_estado=maestrante_estado.idmaestrante_estado and maestrante.idmaestria=maestria.idmaestria and correo.idpersona=persona.idpersona and correo.idcorreo_estado=1 and telefono.idpersona=persona.idpersona and telefono.idtelefono_estado=1;
