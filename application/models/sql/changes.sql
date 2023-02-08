
/*=========================
--fecha: 16 agosto 2022
===========================*/
/*rename table curso to silabo;
alter table silabo modify column idcurso int(11);
alter table silabo drop primary key; 
alter table silabo change idcurso idsilabo int(11) not null auto_increment primary key; */


/*rename table cursounidad to unidadsilabo;
alter table unidadsilabo modify column idcursounidad int(11);
alter table unidadsilabo drop primary key; 
alter table unidadsilabo change idcursounidad idunidadsilabo int(11) not null auto_increment primary key; */

/*
alter table cursodocumento modify column idcurso int(11);
alter table cursodocumento drop foreign key idcurso;
alter table cursodocumento change idcurso idsilabo int(11);
alter table cursodocumento add foreign key (idsilabo) references silabo(idsilabo);
*/


/*alter table evento change idcurso idsilabo int(11);*/

/*alter table asignatura add column idmalla int;*/
/*alter table asignatura add column codigo varchar(10);*/


/*alter table asignatura modify column idasignatura int(11) not null auto_increment;*/

/*alter table tema drop column idunidad;
alter table tema add column idunidadsilabo int(11);*/

/* alter table unidadsilabo change idcurso idsilabo int(11);*/


/* rename table ducumentosilabo to documentosilabo;
alter table documentosilabo modify column idcursodocumento int(11);
alter table documentosilabo drop primary key; */
/*alter table documentosilabo change idcursodocumento iddocumentosilabo int(11) not null auto_increment primary key;*/

/* alter table silabo add column idasignatura int(11); */
/* alter table tema add column idvideotutorial int(11); */
 

/* alter table asistencia add column hora time; */

/*
alter table asistencia add column longitud decimal(11,8);
alter table asistencia add column latitud decimal(10,8);
*/
/*
alter table asignatura add column contenidosminimos text not null;
alter table asignatura add column resultadosaprendizaje text not null;
*/

/*
alter table silabo add column idperiodoacademico int(11);
*/


/*
alter table silabo drop column idevento;
alter table silabo add column iddocente int(11);

*/


/*alter table certificado add column texto1 text;*/
/*
alter table certificado add posi_texto1_x decimal(5,2);
alter table certificado add posi_texto1_y decimal(5,2);
alter table certificado add font_size_texto1 decimal(5,2);
alter table certificado add ancho_texto1 decimal(5,2);
alter table certificado add alto_texto1 decimal(5,2);


*/




/*
rename table fechaevento to sesionevento;
alter table sesionevento modify column idfechaevento int(11);
alter table sesionevento drop primary key; 
alter table sesionevento change idfechaevento idsesionevento int(11) not null auto_increment primary key; 

alter table sesionevento change  idevaluasession idmodoevaluacion int(11) not null default 1;

*/




/*
rename table fechacalendaria to fechacalendario;
alter table fechacalendario modify column idfechacalendaria int(11);
alter table fechacalendario drop primary key; 
alter table fechacalendario change idfechacalendaria idfechacalendario int(11) not null auto_increment primary key; 
alter table fechacalendario drop column idperiodoacademico;
alter table fechacalendario drop column idinstitucion;
alter table fechacalendario change fechacalendaria fechacalendario date;
*/
/*
alter table fechacalendario add column idcalendarioacademico int(11);
*/

/*alter table asistencia drop column idevento;*/
/* alter table asistencia add column idevento int(11);*/


/* alter table sesionevento modify column idtema int(11) default 0;*/

/*alter table distributivodocente change idperiodoacademico iddistributivo int(11);*/

/* alter table distributivo change  idinstitucion idunidad int(11); */

/* alter table calendarioacademico change idinstitucion iddepartamento int(11); */
/*alter table departamento add column iniciales varchar(10);*/

/* alter table calendarioacademico change idinstitucion iddepartamento int(11); */
/* alter table distributivo drop column idinstitucion; */

/* alter table fechacalendario add column hito tinyint default 0; */

/*alter table asignatura add column idareaconocimiento int(11) default 0; */


/*  alter table distributivodocente add column iddepartamento int(11) default 0; */

/* alter table destinatario add column detalle text default '' ; */

/* alter table distributivo add column iddepartamento int(11) default 0;*/

/* alter table distributivodocente drop column iddepartamento; */


/* alter table persona change idgenero idsexo int(11); */


/* alter table estudio add column fecharegistro date; */
/* alter table estudio add column numeroregistro varchar(50); */


/* alter table estudio change titulo titulo text;*/

/*alter table evento add column codigoclassroom varchar(20);*/



/*alter table persona add column idusuario int(11);
alter table persona add column fechacreacion date;
alter table persona add column horacreacion time;*/


/* alter table correo add column idusuario int(11);*/
/* alter table correo add column fechacreacion date; */
/*alter table correo add column horacreacion time; */


/* alter table telefono add column idusuario int(11);*/
/* alter table telefono add column fechacreacion date;*/
/* alter table telefono add column horacreacion time; */



/* alter table sesionevento add column idusuario int(11);*/
/* alter table sesionevento add column fechacreacion date;*/
/* alter table sesionevento add column horacreacion time; */

/* alter table modoevaluacion add column ponderacion decimal(5,3); */

/* alter table sesionevento drop column ponderacion;*/

/* alter table participante add column idnivelparticipante int(11) not null default 1; */



/* alter table institucion add column idusuario int(11); */
 alter table institucion add column fechacreacion date;
 alter table institucion add column horacreacion time;


