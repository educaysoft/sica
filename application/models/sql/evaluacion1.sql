use educayso_facae;
create view evaluacion1 as select  eval.idevaluacion,evpe.idevaluacionpersona, evpe.idpersona,evpe.fecha, eval.idreactivo, eval.idpregunta, eval.idrespuesta,eval.acierto from evaluacion eval, evaluacionpersona evpe  where eval.idevaluacionpersona= evpe.idevaluacionpersona; 
