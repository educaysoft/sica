<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($nivelestudio))
{
?>
        <li> <?php echo anchor('nivelestudio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('nivelestudio/siguiente/'.$nivelestudio['idnivelestudio'], 'siguiente'); ?></li>
        <li> <?php echo anchor('nivelestudio/anterior/'.$nivelestudio['idnivelestudio'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('nivelestudio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('nivelestudio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('nivelestudio/edit/'.$nivelestudio['idnivelestudio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('nivelestudio/delete/'.$nivelestudio['idnivelestudio'],'Delete'); ?></li>
        <li> <?php echo anchor('nivelestudio/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('nivelestudio/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('nivelestudio/save_edit') ?>
<?php echo form_hidden('idnivelestudio',$nivelestudio['idnivelestudio']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idnivelestudio',$nivelestudio['idnivelestudio'],array("disabled"=>"disabled",'placeholder'=>'Idnivelestudios'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Número:</label>
	<div class="col-md-10">
     <?php
       echo form_input('numero',$nivelestudio['numero'],array('placeholder'=>'Numero del nivelestudio')); 
	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$nivelestudio['nombre'],array('placeholder'=>'Nombre del nivelestudio')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



