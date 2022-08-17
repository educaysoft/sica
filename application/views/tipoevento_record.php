<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipoevento))
{
?>
        <li> <?php echo anchor('tipoevento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipoevento/siguiente/'.$tipoevento['idtipoevento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipoevento/anterior/'.$tipoevento['idtipoevento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipoevento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipoevento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipoevento/edit/'.$tipoevento['idtipoevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipoevento/delete/'.$tipoevento['idtipoevento'],'Delete'); ?></li>
        <li> <?php echo anchor('tipoevento/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipoevento/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipoevento/save_edit') ?>
<?php echo form_hidden('idtipoevento',$tipoevento['idtipoevento']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idtipoevento',$tipoevento['idtipoevento'],array("disabled"=>"disabled",'placeholder'=>'Idtipoeventos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$tipoevento['nombre'],array('placeholder'=>'Nombre del tipoevento')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



