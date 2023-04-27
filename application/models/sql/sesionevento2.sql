use educayso_facae;

create view sesionevento2 as select seev.*,tem1.unidad from sesionevento0 seev,tema1 tem1 where seev.idtema=tem1.idtema;  
