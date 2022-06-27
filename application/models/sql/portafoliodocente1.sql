
use educayso_facae;
drop view portafoliodocente1;
create view portafoliodocente1 as select portafoliodocente.idportafoliodocente,
 portafoliomodelo.nombre as eldocumento,persona.idpersona,documento.archivopdf,	
 concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as eldocente,
 portafolioestado.nombre as elestado, directorio.ruta,ordenador.nombre as elordenador,documento.iddocumento 
  from portafoliodocente,docente,persona,portafolioestado,portafoliomodelo,documento,directorio,ordenador  where 
portafoliodocente.idportafoliomodelo=portafoliomodelo.idportafoliomodelo and portafoliodocente.iddocente=docente.iddocente and docente.idpersona=persona.idpersona and portafoliodocente.idportafolioestado=portafolioestado.idportafolioestado and portafoliodocente.iddocumento=documento.iddocumento and documento.iddirectorio=directorio.iddirectorio and documento.idordenador=ordenador.idordenador 

union


 select portafoliodocente.idportafoliodocente,
 portafoliomodelo.nombre as eldocumento,persona.idpersona," " as archivopdf,	
 concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as eldocente,
 portafolioestado.nombre as elestado, " " as ruta," " as elordenador, " " as iddocumento 
  from portafoliodocente,docente,persona,portafolioestado,portafoliomodelo,documento,directorio,ordenador  where 
portafoliodocente.idportafoliomodelo=portafoliomodelo.idportafoliomodelo and portafoliodocente.iddocente=docente.iddocente and docente.idpersona=persona.idpersona and portafoliodocente.idportafolioestado=portafolioestado.idportafolioestado and portafoliodocente.iddocumento =0; 


