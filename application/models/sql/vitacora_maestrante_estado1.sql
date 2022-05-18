use educayso_facae;
create view vitacora_maestrante_estado1 as  select maestrante.idmaestrante, concat(persona.apellidos,"  ",persona.nombres) as maestrante, maestrante_estado.nombre as estado,vitacora_maestrante_estado.fechainicia,vitacora_maestrante_estado.fechafinaliza 
from vitacora_maestrante_estado,maestrante,persona,maestrante_estado 
where vitacora_maestrante_estado.idmaestrante=maestrante.idmaestrante and maestrante.idpersona=persona.idpersona and vitacora_maestrante_estado.idmaestrante_estado=maestrante_estado.idmaestrante_estado;
