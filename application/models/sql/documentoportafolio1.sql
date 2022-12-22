
use educayso_facae;
create view documentoportafolio1 as select dopo.iddocumentoportafolio , dopo.idportafolio, dopo.iddocumento,docu.asunto,docu.fechaelaboracion,docu.archivopdf,pers.idpersona  from documentoportafolio dopo,portafolio pofo, emisor emis, persona pers,documento docu where dopo.iddocumento=docu.iddocumento and docu.iddocumento=emis.iddocumento and emis.idpersona=pofo.idpersona and pofo.idpersona=pers.idpersona;

