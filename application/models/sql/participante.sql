use educayso_facae;


create table participanteestado(idparticipanteestado int(11) not null auto_increment primary key, nombre varchar(50));

alter table participante add column idparticipanteestado int(11);

alter table participante add constraint foreign key(idparticipanteestado) references participanteestado(idparticipanteestado); 
