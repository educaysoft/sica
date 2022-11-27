<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($asignaturadocente))
{
?>
   <li> <?php echo anchor('asignaturadocente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('asignaturadocente/anterior/'.$asignaturadocente['idasignaturadocente'], 'anterior'); ?></li>
   <li> <?php echo anchor('asignaturadocente/siguiente/'.$asignaturadocente['idasignaturadocente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('asignaturadocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('asignaturadocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('asignaturadocente/edit/'.$asignaturadocente['idasignaturadocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('asignaturadocente/delete/'.$asignaturadocente['idasignaturadocente'],'Delete'); ?></li>
        <li> <?php echo anchor('asignaturadocente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('asignaturadocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('asignaturadocente/save_edit') ?>
<?php echo form_hidden('idasignaturadocente',$asignaturadocente['idasignaturadocente']) ?>
<table>
  <tr>
     <td>Id HoarioDocente:</td>
     <td><?php echo form_input('idasignaturadocente',$asignaturadocente['idasignaturadocente'],array("disabled"=>"disabled",'placeholder'=>'Idasignaturadocentes')) ?></td>
  </tr>
 
 
<tr>
     <td>Docente:</td>
     <td><?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

echo form_input('iddocente',$options[$asignaturadocente['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Periodo Académico:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($periodoacademicos as $row){
	      $options[$row->idperiodoacademico]= $row->nombrelargo;
    }
    echo form_input('idperiodoacademico',$options[$asignaturadocente['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  








</table>
<?php echo form_close(); ?>





</body>









</html>
