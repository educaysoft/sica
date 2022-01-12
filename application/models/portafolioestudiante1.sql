
use educayso_facae;


create view portafolioestudiante1 as select portafolioestudiante.idportafolioestudiante,
 portafoliomodelo.nombre as eldocumento,	
 concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elestudiante,
 estado_portafolio.nombre as elestado
  from portafolioestudiante,estudiante,persona,estado_portafolio,portafoliomodelo  where 
portafolioestudiante.idportafoliomodelo=portafoliomodelo.idportafoliomodelo and portafolioestudiante.idestudiante=estudiante.idestudiante and estudiante.idpersona=persona.idpersona and portafolioestudiante.idestado_portafolio=estado_portafolio.idestado_portafolio ;
