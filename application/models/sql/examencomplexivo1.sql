
use educayso_facae;
create view examencomplexivo1 as select ticu.idexamencomplexivo, (select count(idegresado) from egresado egre where egre.idexamencomplexivo= ticu.idexamencomplexivo) as numeroestudiantes, ticu.nombre, ticu.resumen, (select count(idtutorexamencomplexivo) from tutorexamencomplexivo lect where lect.idexamencomplexivo= ticu.idexamencomplexivo) as numerotutorexamencomplexivoes, "" as eltutorexamencomplexivo , ticu.fechacreacion, ticu.horacreacion from examencomplexivo ticu  ;     

