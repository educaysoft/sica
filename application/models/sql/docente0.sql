
use educayso_facae;
drop view docente0;
create view docente0 as select * from docente where eliminado=0;
