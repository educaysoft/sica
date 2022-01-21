use educayso_facae; 
drop view persona2;
create view persona2 as select persona.idpersona,concat(persona.apellidos," ",persona.nombres) as lapersona, correo.nombre as correo,telefono.numero as telefono from persona,correo,telefono,correo_estado,telefono_estado 
where 
persona.idpersona=correo.idpersona and 
persona.idpersona=telefono.idpersona and 
correo.idcorreo_estado=1 and 
telefono.idtelefono_estado=1; 



