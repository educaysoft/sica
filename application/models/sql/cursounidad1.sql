
use educayso_facae;
drop view cursounidad1; 
create view cursounidad1 as select cursounidad.idcursounidad,cursounidad.idcurso,curso.nombre,cursounidad.unidad,cursounidad.nombre as launidad ,cursounidad.idvideotutorial, videotutorial.nombre as elvideo,videotutorial.enlace,videotutorial.idevaluacion from cursounidad,videotutorial,curso where cursounidad.idvideotutorial=videotutorial.idvideotutorial and cursounidad.idcurso=curso.idcurso;
