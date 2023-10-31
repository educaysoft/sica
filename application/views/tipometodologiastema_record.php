<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipometodologiastema))
{
?>
        <li> <?php echo anchor('tipometodologiastema/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipometodologiastema/siguiente/'.$tipometodologiastema['idtipometodologiastema'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipometodologiastema/anterior/'.$tipometodologiastema['idtipometodologiastema'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipometodologiastema/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipometodologiastema/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipometodologiastema/edit/'.$tipometodologiastema['idtipometodologiastema'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipometodologiastema/delete/'.$tipometodologiastema['idtipometodologiastema'],'Delete'); ?></li>
        <li> <?php echo anchor('tipometodologiastema/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipometodologiastema/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipometodologiastema/save_edit') ?>
<?php echo form_hidden('idtipometodologiastema',$tipometodologiastema['idtipometodologiastema']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtipometodologiastema',$tipometodologiastema['idtipometodologiastema'],array("disabled"=>"disabled",'placeholder'=>'Idtipometodologiastemas'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tipometodologiastema['nombre'],array('placeholder'=>'Nombre del tipometodologiastema')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



