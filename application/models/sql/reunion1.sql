
use educayso_facae;
create view reunion1 as select foin.idreunion, foin.nombre as elreunion, foin.detalle, foin.idinstitucion,inst.nombre as lainstitucion,foin.archivo,foin.orden  from reunion foin,institucion inst where foin.idinstitucion=inst.idinstitucion; 
