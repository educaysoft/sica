use educayso_facae;
create view miembrocomisionacademica1 as select micoac.idmiembrocomisionacademica,micoac.idperiodoacademico,micoac.idcomisionacademica,micoac.idpersona,micoac.fechadesde,micoac.fechahasta,peri.nombrecorto as elperiodo, comi.nombre as lacomision, concat(pers.apellidos,"  ",pers.nombres) as lapersona from miembrocomisionacademica micoac,periodoacademico peri,comisionacademica comi, persona pers where micoac.idperiodoacademico=peri.idperiodoacademico and micoac.idcomisionacademica=micoac.idcomisionacademica and micoac.idpersona=pers.idpersona; 



