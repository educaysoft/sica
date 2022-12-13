use educayso_facae;
drop table oficio;
create table oficio(idoficio int(11) not null auto_increment primary key, idevento int(11), iddocumento int(11), idtipodocu int(11), ancho_x decimal(5,2), alto_y decimal(5,2),  fecha1_x decimal(5,2), fecha1_y decimal(5,2), destinatario_x decimal(5,2), destinatario_y decimal(5,2), remitente_x decimal(5,2), remitente_y decimal(5,2), firma_x decimal(5,2), firma_y decimal(5,2), texto1_x decimal(5,2) , texto1_y decimal(5,2) , texto2_x decimal(5,2),  texto2_y  decimal(5,2), codigo_x decimal(5,2), codigo_y decimal(5,2));



