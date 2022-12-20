<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($ciclo))
{
?>
        <li> <?php echo anchor('ciclo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('ciclo/siguiente/'.$ciclo['idciclo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('ciclo/anterior/'.$ciclo['idciclo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ciclo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ciclo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ciclo/edit/'.$ciclo['idciclo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ciclo/delete/'.$ciclo['idciclo'],'Delete'); ?></li>
        <li> <?php echo anchor('ciclo/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('ciclo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('ciclo/save_edit') ?>
<?php echo form_hidden('idciclo',$ciclo['idciclo']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idciclo',$ciclo['idciclo'],array("disabled"=>"disabled",'placeholder'=>'Idciclos'));
	?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
     <?php
       echo form_input('nombre',$ciclo['nombre'],array('placeholder'=>'Nombre del ciclo')); 

	?>
	</div> 
</div> 
   
   
<?php echo form_close(); ?>



