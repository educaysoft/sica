
use educayso_facae;
  drop view trabajointegracioncurricular1;
create view trabajointegracioncurricular1 as select ticu.idtrabajointegracioncurricular,ticu.idestadotrabajointegracioncurricular, (select count(idegresado) from egresado egre where egre.idtrabajointegracioncurricular= ticu.idtrabajointegracioncurricular) as numeroestudiantes, ticu.nombre, ticu.resumen, (select count(idlector) from lector lect where lect.idtrabajointegracioncurricular= ticu.idtrabajointegracioncurricular) as numerolectores, ticu.fechacreacion, ticu.horacreacion from trabajointegracioncurricular ticu     

