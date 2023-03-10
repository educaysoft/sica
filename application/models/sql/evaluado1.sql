use educayso_facae;
drop view tema1;
create view evaluado1 as select  eval.idevaluacion, evdo.idpersona, (select count(idpregunta) from pregunta where preg.idevaluacion=eval.idevaluacion ) as totapreg, (select count(idpreguntas) from evaluado where evdo.idevaluacion=eval.idevaluacion and evdo.acierto=1) as totaacie; 
