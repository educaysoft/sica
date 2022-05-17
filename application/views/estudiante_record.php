<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estudiante))
{
?>
        <li> <?php echo anchor('estudiante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estudiante/anterior/'.$estudiante['idestudiante'], 'anterior'); ?></li>
        <li> <?php echo anchor('estudiante/siguiente/'.$estudiante['idestudiante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estudiante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estudiante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estudiante/edit/'.$estudiante['idestudiante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estudiante/delete/'.$estudiante['idestudiante'],'Delete'); ?></li>
        <li> <?php echo anchor('estudiante/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estudiante/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('estudiante/save_edit') ?>
<?php echo form_hidden('idestudiante',$estudiante['idestudiante']) ?>
<table>
  <tr>
     <td>Id estudiante:</td>
     <td><?php echo form_input('idestudiante',$estudiante['idestudiante'],array("disabled"=>"disabled",'placeholder'=>'Idestudiantes')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$estudiante['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Departamento/Carrera:</td>
     <td><?php 
$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

echo form_input('iddepartamento',$options[$estudiante['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
  


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fechadesde',$estudiante['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')) ?></td>
  </tr>

<tr>
      <td>Fecha hasta:</td>
      <td><?php echo form_input('fechahasta',$estudiante['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;')) ?></td>
  </tr>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('emisor/add', 'Estudios:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($estudios as $row){
		$options[$row->idpersona]=$row->lainstitucion;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idestudio[]',$options,(array)set_value('idestudio', ''), array('style'=>'width:500px')); 
		?>
	</div> 
</div>


</table>
<?php echo form_close(); ?>





</body>









</html>
