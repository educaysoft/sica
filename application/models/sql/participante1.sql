
use educayso_facae;
drop view participante1;
create view participante1 as select participante.idparticipante,participante.idevento,evento.titulo as elevento,participante.idpersona,concat(persona.apellidos," ",persona.nombres) as nombres,documento.archivopdf from participante,persona,evento,documento where participante.idpersona=persona.idpersona and participante.idevento=evento.idevento and participante.iddocumento=documento.iddocumento
UNION 

select participante.idparticipante,participante.idevento,evento.titulo as elevento,participante.idpersona,concat(persona.apellidos," ",persona.nombres) as nombres," " as archivopdf from participante,persona,evento,documento where participante.idpersona=persona.idpersona and participante.idevento=evento.idevento and participante.iddocumento is null;
