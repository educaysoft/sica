use educayso_facae;
drop view criterioseguimientosilabo0;
create view criterioseguimientosilabo0 as select * from criterioseguimientosilabo where eliminado=0;
