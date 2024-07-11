
use educayso_facae;
drop view formatoinstitucional1;
create view formatoinstitucional1 as select arti.idformatoinstitucional, arti.nombre as elformatoinstitucional, arti.detalle, arti.idinstitucion,inst.nombre as lainstitucion,arti.archivo  from formatoinstitucional arti,institucion inst where arti.idinstitucion=inst.idinstitucion; 
