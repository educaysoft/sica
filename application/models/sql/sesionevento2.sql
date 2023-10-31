use educayso_facae;
drop view sesionevento2;
create view sesionevento2 as select seev.*,tem1.unidad,tem1.numerosesion from sesionevento0 seev,tema1 tem1 where seev.idtema=tem1.idtema;  
