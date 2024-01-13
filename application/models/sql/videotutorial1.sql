
use educayso_facae;

drop view videotutorial1 ;
create view videotutorial1 as select vide.idvideotutorial,vide.nombre, vide.enlace, vide.idreactivo, (select reac.nombre from reactivo reac where reac.idreactivo=vide.idreactivo) as elreactivo from videotutorial vide ;
