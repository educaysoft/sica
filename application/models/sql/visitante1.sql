use educayso_facae;

create view visitante1 as select visi.idvisitante,visi.idpersona,depa.iddepartamento,depa.nombre as eldepartamento,concat(pe.apellidos," ",pe.nombres) as lapersona,pers.cedula,visi.firma,visi.motivo  from visitante visi,departamento depa,persona pers where visi.idpersona=pers.idpersona and visi.iddepartamento=depa.iddepartamento;




