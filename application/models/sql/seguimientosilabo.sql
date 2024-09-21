use educayso_facae;
drop table seguimientosilabo;
create table seguimientosilabo(idseguimientosilabo int not null  auto_increment primary key, idevento int, idcriterioseguimientosilabo int, idvalorcriterioseguimientosilabo  int default 1,
foreign key (idcriterioseguimientosilabo) references criterioseguimientosilabo(idcriterioseguimientosilabo),
foreign key (idvalorcriterioseguimientosilabo) references valorcriterioseguimientosilabo(idvalorcriterioseguimientosilabo));


