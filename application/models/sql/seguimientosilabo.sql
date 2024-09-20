use educayso_facae;

create table seguimientosilabo(idseguimientosilabo int not null  auto_increment primary key, idsilabo int, idcriterioseguimientosilabo int, idvalorcriterioseguimientosilabo  int default 1,
foreign key (idcriterioseguimientosilabo) references criterioseguimientosilabo(idcriterioseguimientosilabo),
foreign key (idvalorcriterioseguimientosilabo) references valorcriterioseguimientosilabo(idvalorcriterioseguimientosilabo));


