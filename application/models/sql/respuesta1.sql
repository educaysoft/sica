
use educayso_facae;
create view respuesta1 as select resp.idrespuesta,resp.respuesta,resp.acierto,preg.idpregunta,preg.idevaluacion from respuesta resp,pregunta preg where resp.idpregunta=preg.idpregunta;
