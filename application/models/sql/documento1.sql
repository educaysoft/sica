
use educayso_facae;

drop view documento1;
create view documento1 as select documento.iddocumento,  documento.asunto,documento.ubicacion, documento.fechaelaboracion, documento.fechaentrerecep, documento.archivopdf,tipodocu.idtipodocu, tipodocu.descripcion as eltipodocu,directorio.ruta from documento,tipodocu,directorio  where documento.idtipodocu=tipodocu.idtipodocu and documento.iddirectorio=directorio.iddirectorio ;
