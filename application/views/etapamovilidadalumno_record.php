<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($etapamovilidadalumno))
{
?>
   <li> <?php echo anchor('etapamovilidadalumno/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('etapamovilidadalumno/anterior/'.$etapamovilidadalumno['idetapamovilidadalumno'], 'anterior'); ?></li>
   <li> <?php echo anchor('etapamovilidadalumno/siguiente/'.$etapamovilidadalumno['idetapamovilidadalumno'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('etapamovilidadalumno/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('etapamovilidadalumno/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('etapamovilidadalumno/edit/'.$etapamovilidadalumno['idetapamovilidadalumno'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('etapamovilidadalumno/delete/'.$etapamovilidadalumno['idetapamovilidadalumno'],'Delete'); ?></li>
        <li> <?php echo anchor('etapamovilidadalumno/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('etapamovilidadalumno/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('etapamovilidadalumno/save_edit') ?>
<?php echo form_hidden('idetapamovilidadalumno',$etapamovilidadalumno['idetapamovilidadalumno']) ?>
<table>
  <tr>
     <td>Id DepartamenteoFuncioanrio:</td>
     <td><?php echo form_input('idetapamovilidadalumno',$etapamovilidadalumno['idetapamovilidadalumno'],array("disabled"=>"disabled",'placeholder'=>'Idetapamovilidadalumnos')) ?></td>
  </tr>
 
 
<tr>
     <td>Movilidad alumno:</td>
     <td><?php 
$options= array("NADA");
foreach ($movilidadalumnos as $row){
	$options[$row->idmovilidadalumno]= $row->lapersona;
}

echo form_input('idmovilidadalumno',$options[$etapamovilidadalumno['idmovilidadalumno']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Etapa movilidad:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($etapamovilidads as $row){
	      $options[$row->idetapamovilidad]= $row->nombre;
    }
    echo form_input('idetapamovilidad',$options[$etapamovilidadalumno['idetapamovilidad']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fecha',$etapamovilidadalumno['fecha'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
