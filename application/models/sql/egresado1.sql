
use educayso_facae;

drop view egresado1;
create view egresado1 as select egresado.idtrabajointegracioncurricular,egresado.idexamencomplexivo,egresado.idegresado, egresado.idestudiante,persona.idpersona,persona.cedula,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elegresado, trabajointegracioncurricular.nombre from egresado,estudiante,persona,trabajointegracioncurricular  where egresado.idtrabajointegracioncurricular=trabajointegracioncurricular.idtrabajointegracioncurricular and egresado.idestudiante=estudiante.idestudiante and estudiante.idpersona=persona.idpersona;
