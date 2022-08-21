<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($cicloacademico))
{
?>
        <li> <?php echo anchor('cicloacademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('cicloacademico/siguiente/'.$cicloacademico['idcicloacademico'], 'siguiente'); ?></li>
        <li> <?php echo anchor('cicloacademico/anterior/'.$cicloacademico['idcicloacademico'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('cicloacademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('cicloacademico/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('cicloacademico/edit/'.$cicloacademico['idcicloacademico'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('cicloacademico/delete/'.$cicloacademico['idcicloacademico'],'Delete'); ?></li>
        <li> <?php echo anchor('cicloacademico/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('cicloacademico/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('cicloacademico/save_edit') ?>
<?php echo form_hidden('idcicloacademico',$cicloacademico['idcicloacademico']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idcicloacademico',$cicloacademico['idcicloacademico'],array("disabled"=>"disabled",'placeholder'=>'Idcicloacademicos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$cicloacademico['nombre'],array('placeholder'=>'Nombre del cicloacademico')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



