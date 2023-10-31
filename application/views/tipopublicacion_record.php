<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipopublicacion))
{
?>
        <li> <?php echo anchor('tipopublicacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipopublicacion/siguiente/'.$tipopublicacion['idtipopublicacion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipopublicacion/anterior/'.$tipopublicacion['idtipopublicacion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipopublicacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipopublicacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipopublicacion/edit/'.$tipopublicacion['idtipopublicacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipopublicacion/delete/'.$tipopublicacion['idtipopublicacion'],'Delete'); ?></li>
        <li> <?php echo anchor('tipopublicacion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipopublicacion/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipopublicacion/save_edit') ?>
<?php echo form_hidden('idtipopublicacion',$tipopublicacion['idtipopublicacion']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtipopublicacion',$tipopublicacion['idtipopublicacion'],array("disabled"=>"disabled",'placeholder'=>'Idtipopublicacions'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tipopublicacion['nombre'],array('placeholder'=>'Nombre del tipopublicacion')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



