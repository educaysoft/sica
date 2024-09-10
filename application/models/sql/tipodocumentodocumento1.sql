
use educayso_facae;
create view tipodocumentodocumento1 as select tddo.idtipodocumentodocumento , tddo.idtipodocumento, tddo.iddocumento,docu.asunto,docu.fechaelaboracion,docu.archivopdf from tipodocumentodocumento tddo,tipodocumento tido, documento docu where tddo.iddocumento=docu.iddocumento and  tido.idtipodocumento=tddo.idtipodocumento;

