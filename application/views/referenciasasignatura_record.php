<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($referenciasasignatura))
{
?>
        <li> <?php echo anchor('referenciasasignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('referenciasasignatura/anterior/'.$referenciasasignatura['idreferenciasasignatura'], 'anterior'); ?></li>
        <li> <?php echo anchor('referenciasasignatura/siguiente/'.$referenciasasignatura['idreferenciasasignatura'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('referenciasasignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('referenciasasignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('referenciasasignatura/edit/'.$referenciasasignatura['idreferenciasasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('referenciasasignatura/delete/'.$referenciasasignatura['idreferenciasasignatura'],'Delete'); ?></li>
        <li> <?php echo anchor('referenciasasignatura/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('referenciasasignatura/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('referenciasasignatura/save_edit') ?>
<?php echo form_hidden('idreferenciasasignatura',$referenciasasignatura['idreferenciasasignatura']) ?>
<table>
  <tr>
     <td>Id Referenciasasignatura:</td>
     <td><?php echo form_input('idreferenciasasignatura',$referenciasasignatura['idreferenciasasignatura'],array("disabled"=>"disabled",'placeholder'=>'Idreferenciasasignaturas')) ?></td>
  </tr>
 
 
<tr>
     <td>Asignatura:</td>
     <td><?php 
$options= array("NADA");
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}

echo form_input('idasignatura',$options[$referenciasasignatura['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>
 
 
<tr>
     <td>Tipo de referencias:</td>
     <td><?php 
$options= array("NADA");
foreach ($tiporeferenciasasignaturas as $row){
	$options[$row->idtiporeferenciasasignatura]= $row->nombre;
}

echo form_input('idtiporeferenciasasignatura',$options[$referenciasasignatura['idtiporeferenciasasignatura']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>


 
  <tr>
     <td>Dirección url:</td>
     <td><?php echo form_input('url',$referenciasasignatura['url'],array("disabled"=>"disabled",'placeholder'=>'Direccion web','style'=>'width:500px')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
