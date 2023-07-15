use educayso_facae;
create view metodoaprendizajetema1 as select  mete.idmetodoaprendizajetema,mete.idmetodoaprendizaje,mete.idtema, meap.nombre as elmetodo, tema.nombrecorto   from tema0 tema, metodoaprendizajetema mete,metodoaprendizaje meap where mete.idmetodoaprendizaje=meap.idmetodoaprendizaje and mete.idtema=tema.idtema;  
