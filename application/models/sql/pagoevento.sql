use educayso_facae;



drop table valorevento;
create table pagoevento(idpagoevento int(11) not null auto_increment primary key, idpersona int(11), idevento int(11), fecha date,  valor  decimal(5,2), comentario text); 
