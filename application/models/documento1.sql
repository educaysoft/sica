
use educayso_facae;

create view documento1 as select documento.iddocumento,  documento.asunto, documento.fechaelaboracion, documento.fechaentrerecep, documento.archivopdf, tipodocu.descripcion as eltipodocu from documento,tipodocu  where documento.idtipodocu=tipodocu.idtipodocu ;
