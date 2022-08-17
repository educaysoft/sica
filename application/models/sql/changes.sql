
/*=========================
--fecha: 16 agosto 2022
===========================*/
/*rename table curso to silabo;
alter table silabo modify column idcurso int(11);
alter table silabo drop primary key; */
alter table silabo change idcurso idsilabo int(11) not null auto_increment primary key;
