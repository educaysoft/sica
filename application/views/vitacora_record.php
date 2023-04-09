<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($vitacora))
{
?>
        <li> <?php echo anchor('vitacora/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('vitacora/anterior/'.$vitacora['idvitacora'], 'anterior'); ?></li>
        <li> <?php echo anchor('vitacora/siguiente/'.$vitacora['idvitacora'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('vitacora/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('vitacora/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('vitacora/edit/'.$vitacora['idvitacora'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('vitacora/delete/'.$vitacora['idvitacora'],'Delete'); ?></li>
        <li> <?php echo anchor('vitacora/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('vitacora/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('vitacora/save_edit') ?>
<?php echo form_hidden('idvitacora',$vitacora['idvitacora']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Vitacora Id:</label>
	<div class="col-md-10">
	<?php

      echo form_input('idvitacora',$vitacora['idvitacora'],array("disabled"=>"disabled",'placeholder'=>'Idvitacoras','style'=>'width:500px')); 
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

echo form_input('idusuario',$options[$vitacora['idusuario']],array("disabled"=>"disabled",'style'=>'width:500px')); 
	?>
	</div> 
</div> 
 



<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('modulo/actual/'.$vitacora['idmodulo'], 'Modulo:'); ?> </label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($modulos as $row){
	$options[$row->idmodulo]= $row->nombre;
}

echo form_input('idmodulo',$options[$vitacora['idmodulo']],array("disabled"=>"disabled",'style'=>'width:500px')); 
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('nivelvitacora/actual/'.$vitacora['idnivelvitacora'], 'Nivel de vitacora:'); ?></label>
	<div class="col-md-10">
	<?php

$options= array("NADA");
foreach ($nivelvitacoras as $row){
	$options[$row->idnivelvitacora]= $row->nombre;
}

echo form_input('idnivelvitacora',$options[$vitacora['idnivelvitacora']],array("disabled"=>"disabled",'style'=>'width:500px'));
	?>
	</div> 
</div> 




<?php echo form_close(); ?>





</body>









</html>
