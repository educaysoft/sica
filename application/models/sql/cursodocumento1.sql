
use educayso_facae;
create view cursodocumento1 as select cursodocumento.idcursodocumento,cursodocumento.idcurso,curso.nombre,cursodocumento.iddocumento, documento.asunto  from cursodocumento,documento,curso where cursodocumento.iddocumento=documento.iddocumento and cursodocumento.idcurso=curso.idcurso;
