
use educayso_facae;
create view referenciasasignatura1 as select referenciasasignatura.idreferenciasasignatura,referenciasasignatura.titulo,referenciasasignatura.idasignatura,asignatura.nombre as laasignatura,tiporeferenciasasignatura.idtiporeferenciasasignatura, tiporeferenciasasignatura.nombre as tipo,referenciasasignatura.url  from referenciasasignatura,tiporeferenciasasignatura,asignatura  where referenciasasignatura.idtiporeferenciasasignatura=tiporeferenciasasignatura.idtiporeferenciasasignatura and referenciasasignatura.idasignatura=asignatura.idasignatura;
