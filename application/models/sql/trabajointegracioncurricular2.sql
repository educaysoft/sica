
use educayso_facae;
create view trabajointegracioncurricular2 as select ticu.idtrabajointegracioncurricular, (select elegresado from egresado1 egre where egre.idtrabajointegracioncurricular= ticu.idtrabajointegracioncurricular) as elegresado, ticu.nombre, ticu.resumen, (select iddocente from lector lect where lect.idtrabajointegracioncurricular= ticu.idtrabajointegracioncurricular and lect.idtipolector=1) as iddocente,(select ellector from lector1 lect where lect.idtrabajointegracioncurricular= ticu.idtrabajointegracioncurricular and lect.idtipolector=1) as ellector ,ticu.fechacreacion, ticu.horacreacion from trabajointegracioncurricular ticu     

