
use educayso_facae;
create view referenciasasignatura1 as select referenciasasignatura.idreferenciasasignatura,referenciasasignatura.titulo,referenciasasignatura.idasignatura,tiporeferenciasasignatura.idtiporeferenciasasignatura, tiporeferenciasasignatura.nombre as tipo  from referenciasasignatura,tiporeferenciasasignatura  where referenciasasignatura.idtiporeferenciasasignatura=tiporeferenciasasignatura.idtiporeferenciasasignatura;
