use educayso_facae;


create table egresado(idegresado int(11) not null auto_increment primary key, idestudiante int, idtrabajointegracioncurricular int, foreign key (idestudiante) REFERENCES estudiante (idestudiante), foreign key (idtrabajointegracioncurricular) REFERENCES trabajointegracioncurricular(idtrabajointegracioncurricular));


