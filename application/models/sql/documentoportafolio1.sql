
use educayso_facae;
drop view documentoportafolio1;
create view documentoportafolio1 as select dopo.iddocumentoportafolio , dopo.idportafolio, dopo.iddocumento,dopo.iddocenteactividadacademica,dopo.minutosocupados,docu.asunto,docu.fechaelaboracion,docu.archivopdf,pers.idpersona,peac.idperiodoacademico,peac.nombrecorto as elperiodo from documentoportafolio dopo,portafolio pofo,  persona pers,documento docu, periodoacademico peac where dopo.iddocumento=docu.iddocumento and pofo.idpersona=pers.idpersona and pofo.idportafolio=dopo.idportafolio and pofo.idperiodoacademico=peac.idperiodoacademico;

