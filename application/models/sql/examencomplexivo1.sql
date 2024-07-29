
use educayso_facae;
  drop view examencomplexivo1;
create view examencomplexivo1 as select ticu.idexamencomplexivo,ticu.idestadoexamencomplexivo, etic.nombre as elestado,(select count(idegresado) from egresado egre where egre.idexamencomplexivo= ticu.idexamencomplexivo) as numeroestudiantes, ticu.nombre, ticu.resumen, (select count(idlector) from lector lect where lect.idexamencomplexivo= ticu.idexamencomplexivo) as numerolectores, (select ellector from lector1 lect where lect.idexamencomplexivo= ticu.idexamencomplexivo and lect.idtipolector in (1,5)) as ellector , ticu.fechacreacion, ticu.horacreacion from examencomplexivo ticu,estadoexamencomplexivo etic where ticu.idestadoexamencomplexivo=etic.idestadoexamencomplexivo;     

