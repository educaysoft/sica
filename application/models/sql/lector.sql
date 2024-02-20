use educayso_facae;


create table lector(idlector int(11) not null auto_increment primary key, iddocente int default 0, idtipolector int default 0, idtrabajointegracioncurricular int default 0, foreign key (idtipolector) REFERENCES tipolector(idtipolector), foreign key (iddocente) REFERENCES docente (iddocente), foreign key (idtrabajointegracioncurricular) REFERENCES trabajointegracioncurricular(idtrabajointegracioncurricular));


