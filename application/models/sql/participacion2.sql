
use educayso_facae;
create view participacion2 as select par.idparticipacion,par.idevento,par.fecha,par.porcentaje,par.idpersona,concat(per.apellidos," ",per.nombres) as nombres,par.comentario,gen.nombre, (select ins.nombre from estudio est, institucion ins where est.nivel=2 and est.idinstitucion=ins.idinstitucion and est.idpersona=per.idpersona) as colegio  from participacion par,persona per,genero gen where par.idpersona=per.idpersona and per.idgenero=gen.idgenero;
