
use educayso_facae;
create view asignatura1 as select asi.idasignatura,asi.nombre,asi.creditos,asi.idmalla, (select nombrecorto from malla ma where ma.idmalla=asi.idmalla) as malla, asi.codigo, asi.idnivelacademico,(select nombre from nivelacademico nia where nia.idnivelacademico=asi.idnivelacademico) as nivel from asignatura asi;
