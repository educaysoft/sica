
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


alter table cursodocumento modify column idcurso int(11);
alter table cursodocumento drop foreign key idcurso;
alter table cursodocumento change idcurso idsilabo int(11);
alter table cursodocumento add foreign key (idsilabo) references silabo(idsilabo);
