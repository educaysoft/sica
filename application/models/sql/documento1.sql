
use educayso_facae;

drop view documento1;
create view documento1 as select documento.iddocumento,  documento.asunto,documento.ubicacion, documento.fechaelaboracion, documento.fechaentrerecep, documento.archivopdf, tipodocu.descripcion as eltipodocu from documento,tipodocu  where documento.idtipodocu=tipodocu.idtipodocu ;
