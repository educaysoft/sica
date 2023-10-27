
use educayso_facae;
drop view asignaturadeldocente0;
create view asignaturadeldocente0 as select * from asignaturadeldocente where eliminado=0;
