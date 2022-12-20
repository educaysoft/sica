<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($codigoqr))
{
?>
        <li> <?php echo anchor('codigoqr/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('codigoqr/siguiente/'.$codigoqr['idcodigoqr'], 'siguiente'); ?></li>
        <li> <?php echo anchor('codigoqr/anterior/'.$codigoqr['idcodigoqr'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('codigoqr/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('codigoqr/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('codigoqr/edit/'.$codigoqr['idcodigoqr'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('codigoqr/delete/'.$codigoqr['idcodigoqr'],'Delete'); ?></li>
        <li> <?php echo anchor('codigoqr/listar/','Listar'); ?></li>
        <li> <?php echo anchor('codigoqr/generaqr/'.$codigoqr['idcodigoqr'],'GeneraQR'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('codigoqr/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('codigoqr/save_edit') ?>
<?php echo form_hidden('idcodigoqr',$codigoqr['idcodigoqr']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id:</label>
	<div class="col-md-10">
     <?php
	echo form_input('idcodigoqr',$codigoqr['idcodigoqr'],array("disabled"=>"disabled",'placeholder'=>'Idcodigoqrs'));
	?>
	</div> 
</div> 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Filename:</label>
	<div class="col-md-10">
     <?php
       echo form_input('filename',$codigoqr['filename'],array('placeholder'=>'Nombre del codigoqr')); 

	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> TAmaño:</label>
	<div class="col-md-10">
     <?php
       echo form_input('tamanio',$codigoqr['tamanio'],array('placeholder'=>'Nombre del codigoqr')); 

	?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Level:</label>
	<div class="col-md-10">
     <?php
       echo form_input('level',$codigoqr['level'],array('placeholder'=>'Nombre del codigoqr')); 

	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> framesize:</label>
	<div class="col-md-10">
     <?php
       echo form_input('framesize',$codigoqr['framesize'],array('placeholder'=>'Nombre del codigoqr')); 

	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Contenido:</label>
	<div class="col-md-10">
     <?php
       echo form_input('contenido',$codigoqr['contenido'],array('placeholder'=>'Nombre del codigoqr')); 

	?>
	</div> 
</div>








   
<?php echo form_close(); ?>



