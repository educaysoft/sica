use educayso_facae;
drop view metodoaprendizajetema1;
create view metodoaprendizajetema1 as select  mete.idmetodoaprendizajetema,mete.idmetodoaprendizaje,mete.idtema, meap.nombre as elmetodo, tema.nombrecorto,tema.idsilabo   from tema1 tema, metodoaprendizajetema mete,metodoaprendizaje meap where mete.idmetodoaprendizaje=meap.idmetodoaprendizaje and mete.idtema=tema.idtema;  
