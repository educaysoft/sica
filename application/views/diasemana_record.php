<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($diasemana))
{
?>
        <li> <?php echo anchor('diasemana/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('diasemana/siguiente/'.$diasemana['iddiasemana'], 'siguiente'); ?></li>
        <li> <?php echo anchor('diasemana/anterior/'.$diasemana['iddiasemana'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('diasemana/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('diasemana/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('diasemana/edit/'.$diasemana['iddiasemana'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('diasemana/delete/'.$diasemana['iddiasemana'],'Delete'); ?></li>
        <li> <?php echo anchor('diasemana/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('diasemana/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('diasemana/save_edit') ?>
<?php echo form_hidden('iddiasemana',$diasemana['iddiasemana']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('iddiasemana',$diasemana['iddiasemana'],array("disabled"=>"disabled",'placeholder'=>'Iddiasemanas'));
	?>
	</div> 
</div> 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$diasemana['nombre'],array('placeholder'=>'Nombre del diasemana')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



