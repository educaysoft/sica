
use educayso_facae;
create view documentoportafolio3 as select dopo.iddocumentoportafolio , dopo.idportafolio, dopo.iddocumento,dopo.minutosocupados,docu.asunto,docu.fechaelaboracion,docu.archivopdf,pers.idpersona,peac.idperiodoacademico,peac.nombrecorto as elperiodo,estu.idestudiante,(select tido.descripcion from tipodocu tido where tido.idtipodocu=docu.idtipodocu) as tipodocumento  from documentoportafolio dopo,portafolio pofo,  persona pers,documento docu, periodoacademico peac,estudiante  estu where dopo.iddocumento=docu.iddocumento and pofo.idpersona=pers.idpersona and pofo.idportafolio=dopo.idportafolio and pofo.idperiodoacademico=peac.idperiodoacademico and pofo.idpersona=estu.idpersona;

