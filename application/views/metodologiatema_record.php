<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($metodologiatema))
{
?>
        <li> <?php echo anchor('metodologiatema/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('metodologiatema/anterior/'.$metodologiatema['idmetodologiatema'], 'anterior'); ?></li>
        <li> <?php echo anchor('metodologiatema/siguiente/'.$metodologiatema['idmetodologiatema'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('metodologiatema/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('metodologiatema/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('metodologiatema/edit/'.$metodologiatema['idmetodologiatema'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('metodologiatema/delete/'.$metodologiatema['idmetodologiatema'],'Delete'); ?></li>
        <li> <?php echo anchor('metodologiatema/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('metodologiatema/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('metodologiatema/save_edit') ?>
<?php echo form_hidden('idmetodologiatema',$metodologiatema['idmetodologiatema']) ?>
<table>
  <tr>
     <td>Id Metodologiatema:</td>
     <td><?php echo form_input('idmetodologiatema',$metodologiatema['idmetodologiatema'],array("disabled"=>"disabled",'placeholder'=>'Idmetodologiatemas')) ?></td>
  </tr>
 
 
<tr>
     <td>Asignatura:</td>
     <td><?php 
$options= array("NADA");
foreach ($asignaturas as $row){
	$options[$row->idasignatura]= $row->nombre;
}

echo form_input('idasignatura',$options[$metodologiatema['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>
 
 
<tr>
     <td>Tipo de horas:</td>
     <td><?php 
$options= array("NADA");
foreach ($tipometodologiatemas as $row){
	$options[$row->idtipometodologiatema]= $row->nombre;
}

echo form_input('idtipometodologiatema',$options[$metodologiatema['idtipometodologiatema']],array("disabled"=>"disabled",'style'=>'width:500px')) ?></td>
  </tr>


 
  <tr>
     <td>Cantidad de horas:</td>
     <td><?php echo form_input('cantidad',$metodologiatema['cantidad'],array("disabled"=>"disabled",'placeholder'=>'Cantidad','style'=>'width:500px')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
