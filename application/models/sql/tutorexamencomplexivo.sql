use educayso_facae;


create table tutorexamencomplexivo(idtutorexamencomplexivo int(11) not null auto_increment primary key, iddocente int default 0, idexamencomplexivo int default 0,  foreign key (iddocente) REFERENCES docente (iddocente), foreign key (idexamencomplexivo) REFERENCES examencomplexivo(idexamencomplexivo));


