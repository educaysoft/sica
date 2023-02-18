
use educayso_facae;
create view participacion2 as select par.idparticipacion,par.idevento,par.fecha,par.porcentaje,par.ayuda,par.idpersona,concat(per.apellidos," ",per.nombres) as nombres,par.comentario,sex.idsexo, sex.nombre as sexo,  (select ins.idinstitucion from estudio est, institucion ins where est.idnivelestudio=2 and est.idinstitucion=ins.idinstitucion and est.idpersona=per.idpersona) as idinstitucion ,(select ins.nombre from estudio est, institucion ins where est.idnivelestudio=2 and est.idinstitucion=ins.idinstitucion and est.idpersona=per.idpersona) as colegio, (select pat.idparticipanteestado from participante pat where pat.idpersona=per.idpersona and pat.idevento=par.idevento)  as idparticipanteestado   from participacion par,persona per,sexo sex where par.idpersona=per.idpersona and per.idsexo=sex.idsexo;
