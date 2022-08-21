<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($silabo))
{
?>
        <li> <?php echo anchor('silabo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('silabo/siguiente/'.$silabo['idsilabo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('silabo/anterior/'.$silabo['idsilabo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('silabo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('silabo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('silabo/edit/'.$silabo['idsilabo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('silabo/delete/'.$silabo['idsilabo'],'Delete'); ?></li>
        <li> <?php echo anchor('silabo/listar/','Listar'); ?></li>
        <li> <?php echo anchor('silabounidad/','Unidades'); ?></li>
        <li> <?php echo anchor('silabo/panel/','Panel'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('silabo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('silabo/save_edit') ?>
<?php echo form_hidden('idsilabo',$silabo['idsilabo']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
		<?php
      echo form_input('idsilabo',$silabo['idsilabo'],array("disabled"=>"disabled"));
		?>
	</div> 
</div> 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php
       echo form_input('nombre',$silabo['nombre'],array('placeholder'=>'Nombre del silabo','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Descripción:</label>
	<div class="col-md-10">
		<?php
       echo form_input('descripcion',$silabo['descripcion'],array('placeholder'=>'Descripción del silabo','style'=>'width:500px;'));
		?>
	</div> 
</div>



 <div class="form-group row">
    <label class="col-md-2 col-form-label"> duración:</label>
	<div class="col-md-10">
		<?php
       		echo form_input('duracion',$silabo['duracion'],array('placeholder'=>'Duracion en horas','style'=>'width:500px;'));
		?>
	</div> 
</div>  

<tr>
     <td>Asignatura:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($asignaturas as $row){
	      $options[$row->idasignatura]= $row->nombre;
    }
    echo form_input('idasignatura',$options[$asignatura['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/add', 'Documentos:') ?> </label>
     	<?php 
	$options=array();
  	foreach ($documentosilabos as $row){
		$options[$row->iddocumento]=$row->asunto;
	}
	?>
	<div class="col-md-10">
		<?php
 			echo form_multiselect('iddocumento[]',$options,(array)set_value('iddocumento',''), array('style'=>'width:500px;')); 
		?>
	</div> 
</div>


<?php echo form_close(); ?>



