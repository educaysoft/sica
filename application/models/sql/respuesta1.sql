
use educayso_facae;
drop view respuesta1;
create view respuesta1 as select resp.idrespuesta,resp.respuesta,resp.acierto,preg.idpregunta,preg.idreactivo from respuesta resp,pregunta preg where resp.idpregunta=preg.idpregunta;
