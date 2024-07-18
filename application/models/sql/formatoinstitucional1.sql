
use educayso_facae;
drop view formatoinstitucional1;
create view formatoinstitucional1 as select foin.idformatoinstitucional, foin.nombre as elformatoinstitucional, foin.detalle, foin.idinstitucion,inst.nombre as lainstitucion,foin.archivo,foin.idproceso,proc.color,proc.nombre as elproceso,foin.orden  from formatoinstitucional foin,institucion inst,proceso proc where foin.idinstitucion=inst.idinstitucion and foin.idproceso=proc.idproceso 
