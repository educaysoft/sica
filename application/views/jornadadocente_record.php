<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($jornadadocente))
{
?>
   <li> <?php echo anchor('jornadadocente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('jornadadocente/anterior/'.$jornadadocente['idjornadadocente'], 'anterior'); ?></li>
   <li> <?php echo anchor('jornadadocente/siguiente/'.$jornadadocente['idjornadadocente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('jornadadocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('jornadadocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('jornadadocente/edit/'.$jornadadocente['idjornadadocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('jornadadocente/delete/'.$jornadadocente['idjornadadocente'],'Delete'); ?></li>
        <li> <?php echo anchor('jornadadocente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('jornadadocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('jornadadocente/save_edit') ?>
<?php echo form_hidden('idjornadadocente',$jornadadocente['idjornadadocente']) ?>
<table>
  <tr>
     <td>Id HoarioDocente:</td>
     <td><?php echo form_input('idjornadadocente',$jornadadocente['idjornadadocente'],array("disabled"=>"disabled",'placeholder'=>'Idjornadadocentes')) ?></td>
  </tr>
 
 
<tr>
     <td>HoaridoDocente:</td>
     <td><?php 
$options= array("NADA");
foreach ($horariodocentes as $row){
	$options[$row->idhorariodocente]= $row->elhorariodocente;
}

echo form_input('idhorariodocente',$options[$jornadadocente['idhorariodocente']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Asignatura:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($asignaturas as $row){
	      $options[$row->idasignatura]= $row->nombre;
    }
    echo form_input('idasignatura',$options[$jornadadocente['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  








</table>
<?php echo form_close(); ?>





</body>









</html>
