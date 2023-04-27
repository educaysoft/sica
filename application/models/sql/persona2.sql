use educayso_facae; 
drop view persona2;
create view persona2 as select persona0.idpersona,concat(persona0.apellidos," ",persona0.nombres) as lapersona, correo.nombre as correo,telefono.numero as telefono from persona0,correo,telefono,correo_estado,telefono_estado 
where 
persona0.idpersona=correo.idpersona and 
persona0.idpersona=telefono.idpersona and 
correo.idcorreo_estado=1 and 
telefono.idtelefono_estado=1; 



