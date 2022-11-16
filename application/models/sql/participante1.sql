use educayso_facae;
drop view participante1;
create view participante1 as select pa.idparticipante,pa.idevento,ev.titulo as elevento,pa.idpersona,concat(pe.apellidos," ",pe.nombres) as nombres,doc.archivopdf,pa.grupoletra from participante pa,persona pe,evento ev,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.iddocumento=doc.iddocumento
UNION 

select pa.idparticipante,pa.idevento,ev.titulo as elevento,pa.idpersona,concat(pe.apellidos," ",pe.nombres) as nombres," " as archivopdf,pa.grupoletra  from participante pa,persona pe,evento ev,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.iddocumento is null
UNION

select pa.idparticipante,pa.idevento,ev.titulo as elevento,pa.idpersona,concat(pe.apellidos," ",pe.nombres) as nombres," " as archivopdf,pa.grupoletra  from participante pa,persona pe,evento ev,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.iddocumento=0;
