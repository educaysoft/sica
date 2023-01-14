
use educayso_facae;
drop view asignatura1;
create view asignatura1 as select asi.idasignatura,asi.nombre,asi.creditos,asi.idmalla, (select nombrecorto from malla ma where ma.idmalla=asi.idmalla) as malla, asi.codigo, asi.idnivelacademico,(select numero from nivelacademico nia where nia.idnivelacademico=asi.idnivelacademico) as nivel, (select nombre from areaconocimiento arco where arco.idareaconocimiento=asi.idareaconocimiento) as area from asignatura asi;
