
use educayso_facae;
create view documentotrabajointegracioncurricular1 as select dtic.iddocumentotrabajointegracioncurricular , dtic.idtrabajointegracioncurricular, dtic.iddocumento,docu.asunto,docu.fechaelaboracion,docu.archivopdf from documentotrabajointegracioncurricular dtic,trabajointegracioncurricular ticu, documento docu where dtic.iddocumento=docu.iddocumento and  ticu.idtrabajointegracioncurricular=dtic.idtrabajointegracioncurricular;
