<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipoactividadacademica))
{
?>
        <li> <?php echo anchor('tipoactividadacademica/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipoactividadacademica/siguiente/'.$tipoactividadacademica['idtipoactividadacademica'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipoactividadacademica/anterior/'.$tipoactividadacademica['idtipoactividadacademica'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipoactividadacademica/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipoactividadacademica/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipoactividadacademica/edit/'.$tipoactividadacademica['idtipoactividadacademica'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipoactividadacademica/delete/'.$tipoactividadacademica['idtipoactividadacademica'],'Delete'); ?></li>
        <li> <?php echo anchor('tipoactividadacademica/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipoactividadacademica/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipoactividadacademica/save_edit') ?>
<?php echo form_hidden('idtipoactividadacademica',$tipoactividadacademica['idtipoactividadacademica']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtipoactividadacademica',$tipoactividadacademica['idtipoactividadacademica'],array("disabled"=>"disabled",'placeholder'=>'Idtipoactividadacademicas'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tipoactividadacademica['nombre'],array('placeholder'=>'Nombre del tipoactividadacademica')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



