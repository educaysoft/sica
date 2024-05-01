
use educayso_facae;
create view trabajointegracioncurricular2 as select ticu.idtrabajointegracioncurricular,ticu.idestadotrabajointegracioncurricular,etic.nombre as elestado, (select elegresado from egresado1 egre where egre.idtrabajointegracioncurricular= ticu.idtrabajointegracioncurricular) as elegresado, ticu.nombre, ticu.resumen, lect.iddocente,  lect.ellector, tile.nombre as eltipolector, ticu.fechacreacion, ticu.horacreacion from trabajointegracioncurricular ticu, estadotrabajointegracioncurricular etic, lector1 lect, tipolector tile  where ticu.idestadotrabajointegracioncurricular=etic.idestadotrabajointegracioncurricular and ticu.idtrabajointegracioncurricular=lect.idtrabajointegracioncurricular and lect.idtipolector=tile.idtipolector;    

