use educayso_facae; 
drop view portafolio2;
create view portafolio2 as select port.idportafolio,pele.idperiodoacademico, port.idpersona,pele.nombrecorto as elperiodo,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as lapersona,dopo.iddocumentoportafolio,docu.iddocumento,docu.asunto,docu.fechaelaboracion,docu.archivopdf from portafolio port, periodoacademico pele, persona pers, documento docu, documentoportafolio dopo where port.idperiodoacademico=pele.idperiodoacademico and port.idpersona=pers.idpersona and port.idportafolio=dopo.idportafolio and dopo.iddocumento=docu.iddocumento; 