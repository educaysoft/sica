use educayso_facae;
create view evaluado1 as select evaluado.idevaluado,concat(persona.apellidos," ", persona.nombres) as persona from evaluado,persona where evaluado.idpersona=persona.idpersona;
