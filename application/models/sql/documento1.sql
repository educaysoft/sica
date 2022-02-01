
use educayso_facae;

create view documento1 as select documento.iddocumento,  documento.asunto,documento.ubicacion, documento.fechaelaboracion, documento.fechaentrerecep, documento.archivopdf,tipodocu.idtipodocu, tipodocu.descripcion as eltipodocu, directorio.ruta from documento,tipodocu,directorio  where documento.idtipodocu=tipodocu.idtipodocu and documento.iddirectorio=directorio.iddirectorio   union  select documento.iddocumento,  documento.asunto,documento.ubicacion, documento.fechaelaboracion, documento.fechaentrerecep, documento.archivopdf,tipodocu.idtipodocu, tipodocu.descripcion as eltipodocu, '' as ruto from documento,tipodocu,directorio  where documento.idtipodocu=tipodocu.idtipodocu and  documento.iddirectorio=0 ;
