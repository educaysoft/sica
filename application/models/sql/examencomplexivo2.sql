
use educayso_facae;
create view examencomplexivo2 as select ticu.idexamencomplexivo, (select elegresado from egresado1 egre where egre.idexamencomplexivo= ticu.idexamencomplexivo) as elegresado,(select idegresado from egresado1 egre where egre.idexamencomplexivo= ticu.idexamencomplexivo) as idegresado,  ticu.nombre, ticu.resumen, lect.iddocente,  lect.eltutorexamencomplexivo,  ticu.fechacreacion, ticu.horacreacion from examencomplexivo ticu, tutorexamencomplexivo1 lect   where ticu.idexamencomplexivo=lect.idexamencomplexivo;    

