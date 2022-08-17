use educayso_facae;

drop table tipoevento;
create table tipoevento(idtipoevento int(11) not null auto_increment primary key, nombre varchar(100));
insert into tipoevento(nombre) values("No definido");


alter table evento add column idtipoevento int default(1);
