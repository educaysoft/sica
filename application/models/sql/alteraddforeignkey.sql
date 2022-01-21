
alter table usuario add constraint fk_usuarioinsttituicion foreign key (idinstitucion) references institucion(idinstitucion);
