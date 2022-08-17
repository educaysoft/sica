
use educayso_facae;
drop view cursodocumento1;
create view cursodocumento1 as select cursodocumento.idcursodocumento,cursodocumento.idsilabo,silabo.nombre,cursodocumento.iddocumento, documento.asunto  from cursodocumento,documento,silabo where cursodocumento.iddocumento=documento.iddocumento and cursodocumento.idsilabo=silabo.idsilabo;
