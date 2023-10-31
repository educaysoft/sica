<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($metodologiasasignatura))
{
?>
        <li> <?php echo anchor('metodologiasasignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('metodologiasasignatura/anterior/'.$metodologiasasignatura['idmetodologiasasignatura'], 'anterior'); ?></li>
        <li> <?php echo anchor('metodologiasasignatura/siguiente/'.$metodologiasasignatura['idmetodologiasasignatura'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('metodologiasasignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('metodologiasasignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('metodologiasasignatura/edit/'.$metodologiasasignatura['idmetodologiasasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('metodologiasasignatura/delete/'.$metodologiasasignatura['idmetodologiasasignatura'],'Delete'); ?></li>
        <li> <?php echo anchor('metodologiasasignatura/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('metodologiasasignatura/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('metodologiasasignatura/save_edit') ?>
<?php echo form_hidden('idmetodologiasasignatura',$metodologiasasignatura['idmetodologiasasignatura']) ?>
<table>
  <tr>
     <td>Id Metodologiasasignatura:</td>
     <td><?php echo form_input('idmetodologiasasignatura',$metodologiasasignatura['idmetodologiasasignatura'],array("disabled"=>"disabled",'placeholder'=>'Idmetodologiasasignaturas')) ?></td>
  </tr>
 
 
<tr>
     <td>Asignatura:</td>
     <td><?php 
$options= array("NADA");
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}

echo form_input('idasignatura',$options[$metodologiasasignatura['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>
 
 
<tr>
     <td>Tipo de horas:</td>
     <td><?php 
$options= array("NADA");
foreach ($tipometodologiasasignaturas as $row){
	$options[$row->idtipometodologiasasignatura]= $row->nombre;
}

echo form_input('idtipometodologiasasignatura',$options[$metodologiasasignatura['idtipometodologiasasignatura']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>


 
  <tr>
     <td>Cantidad de horas:</td>
     <td><?php echo form_input('cantidad',$metodologiasasignatura['cantidad'],array("disabled"=>"disabled",'placeholder'=>'Cantidad','style'=>'width:500px')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
