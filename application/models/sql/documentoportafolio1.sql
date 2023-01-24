
use educayso_facae;
drop view documentoportafolio1;
create view documentoportafolio1 as select dopo.iddocumentoportafolio , dopo.idportafolio, dopo.iddocumento,docu.asunto,docu.fechaelaboracion,docu.archivopdf,pers.idpersona  from documentoportafolio dopo,portafolio pofo,  persona pers,documento docu where dopo.iddocumento=docu.iddocumento and pofo.idpersona=pers.idpersona and pofo.idportafolio=dopo.idportafolio;

