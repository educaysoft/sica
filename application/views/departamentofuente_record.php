<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($departamentofuente))
{
?>
        <li> <?php echo anchor('departamentofuente/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('departamentofuente/anterior/'.$departamentofuente['iddepartamentofuente'], 'anterior'); ?></li>
        <li> <?php echo anchor('departamentofuente/siguiente/'.$departamentofuente['iddepartamentofuente'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('departamentofuente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('departamentofuente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('departamentofuente/edit/'.$departamentofuente['iddepartamentofuente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('departamentofuente/delete/'.$departamentofuente['iddepartamentofuente'],'Delete'); ?></li>
        <li> <?php echo anchor('departamentofuente/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('departamentofuente/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('departamentofuente/save_edit') ?>
<?php echo form_hidden('iddepartamento',$departamentofuente['iddepartamento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id departamentofuente:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddepartamentofuente',$departamentofuente['iddepartamentofuente'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentofuentes','style'=>'width:600px;'));
	?>
	</div> 
</div> 


 



 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id departamento/carrera:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddepartamento',$departamentofuente['iddepartamento'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentos','style'=>'width:600px;'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('departamento/actual/'.$departamentofuente['iddepartamento'], 'Documento:'); ?></label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}
echo form_input('iddepartamento',$options[$departamentofuente['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:600px;'));
	?>
	</div> 
</div> 


<?php echo form_close(); ?>





</body>









</html>
