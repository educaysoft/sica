
use educayso_facae;
drop view participante1;
create view participante1 as select participante.idparticipante,participante.idevento,evento.titulo as elevento,participante.idpersona,concat(persona.apellidos," ",persona.nombres) as nombres from participante,persona,evento where participante.idpersona=persona.idpersona and participante.idevento=evento.idevento;
