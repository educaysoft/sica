
use educayso_facae;
  drop view trabajointegracioncurricular1;
create view trabajointegracioncurricular1 as select ticu.idtrabajointegracioncurricular,ticu.idestadotrabajointegracioncurricular, etic.nombre as elestado,(select count(idegresado) from egresado egre where egre.idtrabajointegracioncurricular= ticu.idtrabajointegracioncurricular) as numeroestudiantes, ticu.nombre, ticu.resumen, (select count(idlector) from lector lect where lect.idtrabajointegracioncurricular= ticu.idtrabajointegracioncurricular) as numerolectores, (select ellector from lector1 lect where lect.idtrabajointegracioncurricular= ticu.idtrabajointegracioncurricular and lect.idtipolector in (1,5)) as ellector , ticu.fechacreacion, ticu.horacreacion from trabajointegracioncurricular ticu,estadotrabajointegracioncurricular etic where ticu.idestadotrabajointegracioncurricular=etic.idestadotrabajointegracioncurricular;     

