
use educayso_facae;
drop view documentoportafolio3;
create view documentoportafolio3 as select dopo.iddocumentoportafolio , dopo.idportafolio, dopo.iddocumento,dopo.minutosocupados,docu.asunto,docu.fechaelaboracion,docu.archivopdf,pers.idpersona,peac.idperiodoacademico,peac.nombrecorto as elperiodo,alum.idalumno,(select tido.descripcion from tipodocu tido where tido.idtipodocu=docu.idtipodocu) as tipodocumento  from documentoportafolio dopo,portafolio pofo,  persona pers,documento docu, periodoacademico peac,alumno  alum where dopo.iddocumento=docu.iddocumento and pofo.idpersona=pers.idpersona and pofo.idportafolio=dopo.idportafolio and pofo.idperiodoacademico=peac.idperiodoacademico and pofo.idpersona=alum.idpersona;

