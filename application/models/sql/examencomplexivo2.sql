
use educayso_facae;
drop view examencomplexivo2;
create view examencomplexivo2 as select ticu.idexamencomplexivo, egre.elegresado,egre.idegresado,  ticu.nombre, ticu.resumen,     ticu.fechacreacion, ticu.horacreacion from examencomplexivo ticu, egresado1 egre   where ticu.idexamencomplexivo=egre.idexamencomplexivo;    

