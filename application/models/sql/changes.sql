
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


alter table silabo add column idperiodoacademico int(11);

