<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($horasasignatura))
{
?>
        <li> <?php echo anchor('horasasignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('horasasignatura/anterior/'.$horasasignatura['idhorasasignatura'], 'anterior'); ?></li>
        <li> <?php echo anchor('horasasignatura/siguiente/'.$horasasignatura['idhorasasignatura'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('horasasignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('horasasignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('horasasignatura/edit/'.$horasasignatura['idhorasasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('horasasignatura/delete/'.$horasasignatura['idhorasasignatura'],'Delete'); ?></li>
        <li> <?php echo anchor('horasasignatura/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('horasasignatura/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('horasasignatura/save_edit') ?>
<?php echo form_hidden('idhorasasignatura',$horasasignatura['idhorasasignatura']) ?>
<table>
  <tr>
     <td>Id Horasasignatura:</td>
     <td><?php echo form_input('idhorasasignatura',$horasasignatura['idhorasasignatura'],array("disabled"=>"disabled",'placeholder'=>'Idhorasasignaturas')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}

echo form_input('idasignatura',$options[$horasasignatura['idasignatura']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 



 
  <tr>
     <td>Horasasignatura:</td>
     <td><?php echo form_input('nombre',$horasasignatura['nombre'],array("disabled"=>"disabled",'placeholder'=>'Nombre')) ?></td>
  </tr>


  
<tr>
     <td>Estado del Horasasignatura:</td>
     <td><?php 
$options= array("NADA");
foreach ($horasasignatura_estados as $row){
	$options[$row->idhorasasignatura_estado]= $row->nombre;
}

echo form_input('idhorasasignatura_estado',$options[$horasasignatura['idhorasasignatura_estado']],array("disabled"=>"disabled")) ?></td>
  </tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
