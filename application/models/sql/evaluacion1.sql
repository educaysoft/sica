use educayso_facae;
drop view evaluacion1;
create view evaluacion1 as select  eval.idevaluacion,evpe.idevaluacionpersona, evpe.idpersona,evpe.fecha, evpe.idreactivo, eval.idpregunta, eval.idrespuesta,eval.acierto from evaluacion eval, evaluacionpersona evpe  where eval.idevaluacionpersona= evpe.idevaluacionpersona; 
