<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipopublicaciondocente))
{
?>
        <li> <?php echo anchor('tipopublicaciondocente/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipopublicaciondocente/siguiente/'.$tipopublicaciondocente['idtipopublicaciondocente'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipopublicaciondocente/anterior/'.$tipopublicaciondocente['idtipopublicaciondocente'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipopublicaciondocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipopublicaciondocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipopublicaciondocente/edit/'.$tipopublicaciondocente['idtipopublicaciondocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipopublicaciondocente/delete/'.$tipopublicaciondocente['idtipopublicaciondocente'],'Delete'); ?></li>
        <li> <?php echo anchor('tipopublicaciondocente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipopublicaciondocente/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipopublicaciondocente/save_edit') ?>
<?php echo form_hidden('idtipopublicaciondocente',$tipopublicaciondocente['idtipopublicaciondocente']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtipopublicaciondocente',$tipopublicaciondocente['idtipopublicaciondocente'],array("disabled"=>"disabled",'placeholder'=>'Idtipopublicaciondocentes'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tipopublicaciondocente['nombre'],array('placeholder'=>'Nombre del tipopublicaciondocente')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



