use educayso_facae;
drop view participante1;
/*
create view participante1 as select pa.idparticipante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres,doc.archivopdf,pa.grupoletra,(select count(asis.idtipoasistencia) from asistencia asis where asis.idpersona=pa.idpersona and asis.idtipoasistencia=1) as puntual,(select count(asis.idtipoasistencia) from asistencia asis where asis.idpersona=pa.idpersona and asis.idtipoasistencia=2) as atrasado  from participante pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.iddocumento=doc.iddocumento
UNION 
select pa.idparticipante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres," " as archivopdf,pa.grupoletra ,(select count(asis.idtipoasistencia) from asistencia asis where asis.idpersona=pa.idpersona and asis.idtipoasistencia=1) as puntual,(select count(asis.idtipoasistencia) from asistencia asis where asis.idpersona=pa.idpersona and asis.idtipoasistencia=2) as atrasado  from participante pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and  pa.iddocumento=0;
*/




create view participante1 as select pa.idparticipante,pa.idnivelparticipante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres,pe.cedula,doc.archivopdf,pa.grupoletra  from participante0 pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.iddocumento=doc.iddocumento
UNION 

select pa.idparticipante,pa.idnivelparticipante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as nombres,pe.cedula," " as archivopdf,pa.grupoletra  from participante0 pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento and pa.idevento=ev.idevento and  pa.iddocumento=0;



