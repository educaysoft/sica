use educayso_facae;
/*create table fechaevento(idfechaevento int(11) not null auto_increment,idevento int(11),fecha date,tema text, primary key (idfechaevento))*/

alter table fechaevento drop column fechainicio ;
alter table fechaevento drop column fechafin;


alter table fechaevento add column horainicio time;
alter table fechaevento add column horafin time;
