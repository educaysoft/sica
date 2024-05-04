use educayso_facae;
create view asignatura1 as select asig.idasignatura,asig.nombre,asig.creditos,asig.idmalla, (select nombrecorto from malla ma where ma.idmalla=asig.idmalla) as malla, asig.codigo, asig.idnivelacademico,(select numero from nivelacademico nia where nia.idnivelacademico=asig.idnivelacademico) as nivel, (select nombre from areaconocimiento arco where arco.idareaconocimiento=asig.idareaconocimiento) as area, (select cantidad from horasasignatura hoas where hoas.idasignatura=asig.idasignatura and hoas.idtipohorasasignatura=1) as docencia, (select cantidad from horasasignatura hoas where hoas.idasignatura=asig.idasignatura and hoas.idtipohorasasignatura=2) as practicas, (select cantidad from horasasignatura hoas where hoas.idasignatura=asig.idasignatura and hoas.idtipohorasasignatura=3) as autonomas    from asignatura0 asig;
