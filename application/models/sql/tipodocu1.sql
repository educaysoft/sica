use educayso_facae;
drop view tipodocu1;
create view tipodocu1 as select idtipodocu, descripcion, (select count(d.iddocumento) from documento d  where d.idtipodocu = t.idtipodocu)  as cantidad from tipodocu t;
