use educayso_facae;
create view malla1 as select mall.idmalla,depa.iddepartamento,depa.nombre as eldepartamento, mall.nombrecorto  as lamalla  from malla mall,departamento depa where mall.iddepartamento=depa.iddepartamento;
