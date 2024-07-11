
use educayso_facae;

create view formatoinstitucional1 as select arti.idformatoinstitucional, arti.nombre as elformatoinstitucional, arti.detalle, arti.idinstitucion,inst.nombre as lainstitucion  from formatoinstitucional arti,institucion inst where arti.idinstitucion=inst.idinstitucion; 
