
use educayso_facae;
create view pagoevento1 as select pagoevento.idpagoevento,pagoevento.idevento,pagoevento.fecha,pagoevento.valor,pagoevento.idpersona,concat(persona.apellidos," ",persona.nombres) as nombres,pagoevento.comentario from pagoevento,persona where pagoevento.idpersona=persona.idpersona;
