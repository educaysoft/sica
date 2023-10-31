<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($metodologiastema))
{
?>
        <li> <?php echo anchor('metodologiastema/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('metodologiastema/anterior/'.$metodologiastema['idmetodologiastema'], 'anterior'); ?></li>
        <li> <?php echo anchor('metodologiastema/siguiente/'.$metodologiastema['idmetodologiastema'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('metodologiastema/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('metodologiastema/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('metodologiastema/edit/'.$metodologiastema['idmetodologiastema'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('metodologiastema/delete/'.$metodologiastema['idmetodologiastema'],'Delete'); ?></li>
        <li> <?php echo anchor('metodologiastema/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('metodologiastema/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('metodologiastema/save_edit') ?>
<?php echo form_hidden('idmetodologiastema',$metodologiastema['idmetodologiastema']) ?>
<table>
  <tr>
     <td>Id Metodologiastema:</td>
     <td><?php echo form_input('idmetodologiastema',$metodologiastema['idmetodologiastema'],array("disabled"=>"disabled",'placeholder'=>'Idmetodologiastemas')) ?></td>
  </tr>
 
 
<tr>
     <td>Asignatura:</td>
     <td><?php 
$options= array("NADA");
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}

echo form_input('idasignatura',$options[$metodologiastema['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>
 
 
<tr>
     <td>Tipo de horas:</td>
     <td><?php 
$options= array("NADA");
foreach ($tipometodologiastemas as $row){
	$options[$row->idtipometodologiastema]= $row->nombre;
}

echo form_input('idtipometodologiastema',$options[$metodologiastema['idtipometodologiastema']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>


 
  <tr>
     <td>Cantidad de horas:</td>
     <td><?php echo form_input('cantidad',$metodologiastema['cantidad'],array("disabled"=>"disabled",'placeholder'=>'Cantidad','style'=>'width:500px')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
