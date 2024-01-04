use educayso_facae;
drop view documentosilabo1;
create view documentosilabo1 as select documentosilabo.iddocumentosilabo,documentosilabo.idsilabo,silabo.nombre as elsilabo,documentosilabo.iddocumento, documento.asunto as eldocumento from documentosilabo,documento,silabo where documentosilabo.iddocumento=documento.iddocumento and documentosilabo.idsilabo=silabo.idsilabo;
