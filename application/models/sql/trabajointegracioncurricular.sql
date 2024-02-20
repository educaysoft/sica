use educayso_facae;
create table trabajointegracioncurricular(idtrabajointegracioncurricular int(11) not null auto_increment primary key, nombre varchar(50), resumen text, fechacreacion date, horacreacion time,idusuario int(11) default 0, eliminado tinyint default 0);


