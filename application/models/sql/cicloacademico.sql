use educayso_facae;

/*drop table ciclo;
create table cicloacademico(idcicloacademico int(11) not null auto_increment primary key, nombre varchar(100));*/

alter table asignatura drop column idciclo;
alter table asignatura add column idcicloacademico int;


