
use educayso_facae;
drop view participacion2;
create view participacion2 as select par.idparticipacion,par.idevento,par.fecha,par.porcentaje,par.idpersona,concat(per.apellidos," ",per.nombres) as nombres,par.comentario,gen.idgenero, gen.nombre as genero,  (select ins.idinstitucion from estudio est, institucion ins where est.nivel=2 and est.idinstitucion=ins.idinstitucion and est.idpersona=per.idpersona) as idinstitucion ,(select ins.nombre from estudio est, institucion ins where est.nivel=2 and est.idinstitucion=ins.idinstitucion and est.idpersona=per.idpersona) as colegio  from participacion par,persona per,genero gen where par.idpersona=per.idpersona and per.idgenero=gen.idgenero;
