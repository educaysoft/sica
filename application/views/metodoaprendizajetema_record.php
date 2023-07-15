<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($metodoaprendizajetema))
{
?>
        <li> <?php echo anchor('metodoaprendizajetema/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/anterior/'.$metodoaprendizajetema['idmetodoaprendizajetema'], 'anterior'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/siguiente/'.$metodoaprendizajetema['idmetodoaprendizajetema'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('metodoaprendizajetema/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/edit/'.$metodoaprendizajetema['idmetodoaprendizajetema'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('metodoaprendizajetema/delete/'.$metodoaprendizajetema['idmetodoaprendizajetema'],'Delete'); ?></li>
        <li> <?php echo anchor('metodoaprendizajetema/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('metodoaprendizajetema/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('metodoaprendizajetema/save_edit') ?>
<?php echo form_hidden('idmetodoaprendizajetema',$metodoaprendizajetema['idmetodoaprendizajetema']) ?>
<table>
  <tr>
     <td>Id Metodoaprendizajetema:</td>
     <td><?php echo form_input('idmetodoaprendizajetema',$metodoaprendizajetema['idmetodoaprendizajetema'],array("disabled"=>"disabled",'placeholder'=>'Idmetodoaprendizajetemas')) ?></td>
  </tr>
 
 
<tr>
     <td>Asignatura:</td>
     <td><?php 
$options= array("NADA");
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}

echo form_input('idasignatura',$options[$metodoaprendizajetema['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>
 
 
<tr>
     <td>Tipo de horas:</td>
     <td><?php 
$options= array("NADA");
foreach ($tipometodoaprendizajetemas as $row){
	$options[$row->idtipometodoaprendizajetema]= $row->nombre;
}

echo form_input('idtipometodoaprendizajetema',$options[$metodoaprendizajetema['idtipometodoaprendizajetema']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>


 
  <tr>
     <td>Cantidad de horas:</td>
     <td><?php echo form_input('cantidad',$metodoaprendizajetema['cantidad'],array("disabled"=>"disabled",'placeholder'=>'Cantidad','style'=>'width:500px')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
