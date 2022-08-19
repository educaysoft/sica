use educayso_facae;
create view documentosilabo1 as select documentosilabo.iddocumentosilabo,documentosilabo.idsilabo,silabo.nombre,documentosilabo.iddocumento, documento.asunto  from documentosilabo,documento,silabo where documentosilabo.iddocumento=documento.iddocumento and documentosilabo.idsilabo=silabo.idsilabo;
