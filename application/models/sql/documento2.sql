
use educayso_facae;
create view documento2 as select do.iddocumento, (select concat(COALESCE(pe.apellidos,''),"  ",COALESCE(pe.nombres,'')) from persona pe,destinatario de where do.iddocumento=de.iddocumento and de.idpersona=pe.idpersona LIMIT 1) as autor,(select pe.idpersona from persona pe,destinatario de where do.iddocumento=de.iddocumento and de.idpersona=pe.idpersona LIMIT 1 ) as idpersona   ,  do.asunto, do.fechaelaboracion,  do.archivopdf,ti.idtipodocu, ti.descripcion as eltipodocu, di.ruta,ord.nombre as elordenador from documento do,tipodocu ti,directorio di, ordenador ord  where do.idtipodocu=ti.idtipodocu and do.iddirectorio=di.iddirectorio and do.idordenador = ord.idordenador    

 union 

 select do.iddocumento,   (select concat(COALESCE(pe.apellidos,''),"  ",COALESCE(pe.nombres,'')) from persona pe,destinatario de where do.iddocumento=de.iddocumento and de.idpersona=pe.idpersona LIMIT 1 ) as autor,(select pe.idpersona from persona pe,destinatario de where do.iddocumento=de.iddocumento and de.idpersona=pe.idpersona LIMIT 1 ) as idpersona  , do.asunto, do.fechaelaboracion, do.archivopdf, ti.idtipodocu, ti.descripcion as eltipodocu, '' as ruta, '' as elordenador from documento do,tipodocu ti,directorio di, ordenador ord where do.idtipodocu=ti.idtipodocu and  do.iddirectorio=0  and do.idordenador=0 ;
