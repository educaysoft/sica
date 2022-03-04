
use educayso_facae;


create view departamento1 as select departamento.iddepartamento, departamento.idunidad as idunidad, unidad.nombre as launidad, departamento.nombre from departamento,unidad  where  departamento.idunidad=unidad.idunidad ;
