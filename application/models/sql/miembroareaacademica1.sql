use educayso_facae;
create view miembroareaacademica1 as select micoac.idmiembroareaacademica,micoac.idperiodoacademico,micoac.idareaacademica,micoac.idpersona,micoac.fechadesde,micoac.fechahasta,peri.nombrecorto as elperiodo, comi.nombre as laarea, concat(pers.apellidos,"  ",pers.nombres) as lapersona from miembroareaacademica micoac,periodoacademico peri,areaacademica comi, persona pers where micoac.idperiodoacademico=peri.idperiodoacademico and micoac.idareaacademica=comi.idareaacademica and micoac.idpersona=pers.idpersona; 



