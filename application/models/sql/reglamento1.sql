
use educayso_facae;
create view reglamento1 as select foin.idreglamento, foin.nombre as elreglamento, foin.detalle, foin.idinstitucion,inst.nombre as lainstitucion,foin.archivo,foin.idproceso,proc.color,proc.nombre as elproceso,foin.orden  from reglamento foin,institucion inst,proceso proc where foin.idinstitucion=inst.idinstitucion and foin.idproceso=proc.idproceso 
