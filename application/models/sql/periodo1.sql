
use educayso_facae;
create view portafolio1 as select pofo.idportafolio , pofo.idperiodoacademico, pofo.idpersona,concat( COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')," - ",COALESCE(peac.nombrecorto,'')) as elportafolio  from portafolio pofo, periodoacademico peac, persona pers where pofo.idperiodoacademico=peac.idperiodoacademico and pofo.idpersona=pers.idpersona;
