
use educayso_facae;
create view documentoexamencomplexivo1 as select dtic.iddocumentoexamencomplexivo , dtic.idtrabajointegracioncurricular, dtic.iddocumento,docu.asunto,docu.fechaelaboracion,docu.archivopdf from documentoexamencomplexivo dtic,trabajointegracioncurricular ticu, documento docu where dtic.iddocumento=docu.iddocumento and  ticu.idtrabajointegracioncurricular=dtic.idtrabajointegracioncurricular;

