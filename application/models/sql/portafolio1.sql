use educayso_facae; 
create view portafolio1 as select port.idportafolio,pele.idperiodoacademico, port.idpersona,pele.nombrecorto as elperiodo,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as lapersona from portafolio port, periodoacademico pele, persona pers where port.idperiodoacademico=pele.idperiodoacademico and port.idpersona=pers.idpersona; 
