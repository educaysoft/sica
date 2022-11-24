<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($horariodocente))
{
?>
   <li> <?php echo anchor('horariodocente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('horariodocente/anterior/'.$horariodocente['idhorariodocente'], 'anterior'); ?></li>
   <li> <?php echo anchor('horariodocente/siguiente/'.$horariodocente['idhorariodocente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('horariodocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('horariodocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('horariodocente/edit/'.$horariodocente['idhorariodocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('horariodocente/delete/'.$horariodocente['idhorariodocente'],'Delete'); ?></li>
        <li> <?php echo anchor('horariodocente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('horariodocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('horariodocente/save_edit') ?>
<?php echo form_hidden('idhorariodocente',$horariodocente['idhorariodocente']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('idhorariodocente',$horariodocente['idhorariodocente'],array("disabled"=>"disabled",'placeholder'=>'Idhorariodocentes')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->apellidos." ".$row->nombres;
}

echo form_input('iddocente',$options[$horariodocente['iddocente']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Institucion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($periodoacademicoes as $row){
	      $options[$row->idperiodoacademico]= $row->nombre;
    }
    echo form_input('idperiodoacademico',$options[$horariodocente['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input('fechainscripcion',$horariodocente['fechainscripcion'],array('type'=>'date','placeholder'=>'fechainscripcion','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
