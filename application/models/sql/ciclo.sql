use educayso_facae;

create table ciclo(idciclo int(11) not null auto_increment primary key, nombre varchar(100));

alter table asignatura add column idciclo int;


