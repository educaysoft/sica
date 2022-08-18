use educayso_facae;
/*create table fechaevento(idfechaevento int(11) not null auto_increment,idevento int(11),fecha date,tema text, primary key (idfechaevento))*/

alter table fechaevento add column fechainicio time;
alter table fechaevento add column fechafin time;

