use educayso_facae;

create view jornadadocente1 as select jodo.idasignaturadocente,jodo.idjornadadocente,jodo.horainicio,jodo.duracionminutos,dise.nombre from jornadadocente jodo, diasemana dise where jodo.iddiasemana=dise.iddiasemana;
