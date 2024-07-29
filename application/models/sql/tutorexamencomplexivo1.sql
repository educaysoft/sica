
use educayso_facae;
create view tutorexamencomplexivo1 as select tutorexamencomplexivo.idexamencomplexivo, tutorexamencomplexivo.iddocente,persona.idpersona,persona.cedula,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as eltutorexamencomplexivo, examencomplexivo.nombre from tutorexamencomplexivo,docente,persona,examencomplexivo  where tutorexamencomplexivo.idexamencomplexivo=examencomplexivo.idexamencomplexivo and tutorexamencomplexivo.iddocente=docente.iddocente and docente.idpersona=persona.idpersona;
