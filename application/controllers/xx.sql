
use educayso_facae;

create view maestrante1 as select maestrante.idmaestrante,persona.idpersona,concat(persona.apellidos,"  ",persona.nombres) as maestrante,maestrante_estado.idmaestrante_estado,maestrante_estado.nombre as estado,maestria.nombre as maestria from maestrante,persona,maestrante_estado,maestria where maestrante.idpersona=persona.idpersona and maestrante.idmaestrante_estado=maestrante_estado.idmaestrante_estado and maestrante.idmaestria=maestria.idmaestria;
