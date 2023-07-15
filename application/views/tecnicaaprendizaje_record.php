<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tecnicaaprendizaje))
{
?>
        <li> <?php echo anchor('tecnicaaprendizaje/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tecnicaaprendizaje/siguiente/'.$tecnicaaprendizaje['idtecnicaaprendizaje'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tecnicaaprendizaje/anterior/'.$tecnicaaprendizaje['idtecnicaaprendizaje'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tecnicaaprendizaje/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tecnicaaprendizaje/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tecnicaaprendizaje/edit/'.$tecnicaaprendizaje['idtecnicaaprendizaje'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tecnicaaprendizaje/delete/'.$tecnicaaprendizaje['idtecnicaaprendizaje'],'Delete'); ?></li>
        <li> <?php echo anchor('tecnicaaprendizaje/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tecnicaaprendizaje/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tecnicaaprendizaje/save_edit') ?>
<?php echo form_hidden('idtecnicaaprendizaje',$tecnicaaprendizaje['idtecnicaaprendizaje']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtecnicaaprendizaje',$tecnicaaprendizaje['idtecnicaaprendizaje'],array("disabled"=>"disabled",'placeholder'=>'Idtecnicaaprendizajes'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tecnicaaprendizaje['nombre'],array('placeholder'=>'Nombre del tecnicaaprendizaje')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



