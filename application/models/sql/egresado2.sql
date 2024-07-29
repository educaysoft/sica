
use educayso_facae;

create view egresado2 as select egresado.idexamencomplexivo,egresado.idegresado, egresado.idestudiante,persona.idpersona,persona.cedula,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elegresado, examencomplexivo.nombre from egresado,estudiante,persona,examencomplexivo  where egresado.idexamencomplexivo=examencomplexivo.idexamencomplexivo and egresado.idestudiante=estudiante.idestudiante and estudiante.idpersona=persona.idpersona;
