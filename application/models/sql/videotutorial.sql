use educayso_facae;



create table instructor(idinstructor int(11) not null auto_increment primary key, idpersona int(11)); 

create table videotutorial(idvideotutorial int(11) not null auto_increment primary key, nombre varchar(100), idinstructor int(11), idevaluacion int(11), duracion decimal(10,2), enlace varchar(300) ); 
