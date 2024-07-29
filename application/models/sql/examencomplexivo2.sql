
use educayso_facae;
drop view examencomplexivo2;
create view examencomplexivo2 as select exco.idexamencomplexivo, egre.elegresado,egre.idegresado,  exco.nombre, exco.resumen,     exco.fechacreacion, exco.horacreacion from examencomplexivo exco, egresado2 egre   where exco.idexamencomplexivo=egre.idexamencomplexivo;    

