
use educayso_facae;
drop view movilidadalumno1;
create view movilidadalumno1 as select movilidadalumno.idmovilidadalumno,movilidadalumno.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as lapersona,movilidadalumno.iddepartamentofuente,departamentofuente1.eldepartamento as fuente,movilidadalumno.iddepartamentodestino,departamentodestino1.eldepartamento as destino,movilidadalumno.idtipomovilidadalumno   from movilidadalumno,persona,departamentofuente1,departamentodestino1  where movilidadalumno.idpersona=persona.idpersona and movilidadalumno.iddepartamentofuente=departamentofuente1.iddepartamentofuente and movilidadalumno.iddepartamentodestino=departamentodestino1.iddepartamentodestino;
