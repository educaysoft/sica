<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($acceso))
{
?>
        <li> <?php echo anchor('acceso/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('acceso/anterior/'.$acceso['idacceso'], 'anterior'); ?></li>
        <li> <?php echo anchor('acceso/siguiente/'.$acceso['idacceso'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('acceso/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('acceso/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('acceso/edit/'.$acceso['idacceso'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('acceso/delete/'.$acceso['idacceso'],'Delete'); ?></li>
        <li> <?php echo anchor('acceso/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('acceso/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('acceso/save_edit') ?>
<?php echo form_hidden('idacceso',$acceso['idacceso']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Acceso Id:</label>
	<div class="col-md-10">
	<?php

      echo form_input('idacceso',$acceso['idacceso'],array("disabled"=>"disabled",'placeholder'=>'Idaccesos','style'=>'width:500px')); 
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Usuario:</label>
	<div class="col-md-10">
	<?php
 
$options= array("NADA");
foreach ($usuarios as $row){
	$options[$row->idusuario]= $row->elusuario."-".$row->email;
}

echo form_input('idusuario',$options[$acceso['idusuario']],array("disabled"=>"disabled",'style'=>'width:500px')); 
	?>
	</div> 
</div> 
 



<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('modulo/actual/'.$acceso['idmodulo'], 'Modulo:'); ?> </label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($modulos as $row){
	$options[$row->idmodulo]= $row->nombre;
}

echo form_input('idmodulo',$options[$acceso['idmodulo']],array("disabled"=>"disabled",'style'=>'width:500px')); 
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('niveacceso/actual/'.$acceso['idnivelacceso'], 'Nivel de acceso:'); ?></label>
	<div class="col-md-10">
	<?php

$options= array("NADA");
foreach ($nivelaccesos as $row){
	$options[$row->idnivelacceso]= $row->nombre;
}

echo form_input('idnivelacceso',$options[$acceso['idnivelacceso']],array("disabled"=>"disabled",'style'=>'width:500px'));
	?>
	</div> 
</div> 




<?php echo form_close(); ?>





</body>









</html>
