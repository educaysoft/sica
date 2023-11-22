<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($departamentodestino))
{
?>
        <li> <?php echo anchor('departamentodestino/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('departamentodestino/anterior/'.$departamentodestino['iddepartamentodestino'], 'anterior'); ?></li>
        <li> <?php echo anchor('departamentodestino/siguiente/'.$departamentodestino['iddepartamentodestino'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('departamentodestino/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('departamentodestino/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('departamentodestino/edit/'.$departamentodestino['iddepartamentodestino'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('departamentodestino/delete/'.$departamentodestino['iddepartamentodestino'],'Delete'); ?></li>
        <li> <?php echo anchor('departamentodestino/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('departamentodestino/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('departamentodestino/save_edit') ?>
<?php echo form_hidden('iddepartamento',$departamentodestino['iddepartamento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id departamentodestino:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddepartamentodestino',$departamentodestino['iddepartamentodestino'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentodestinos','style'=>'width:600px;'));
	?>
	</div> 
</div> 


 



 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id departamento/carrera:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddepartamento',$departamentodestino['iddepartamento'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentos','style'=>'width:600px;'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('departamento/actual/'.$departamentodestino['iddepartamento'], 'Documento:'); ?></label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}
echo form_input('iddepartamento',$options[$departamentodestino['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:600px;'));
	?>
	</div> 
</div> 


<?php echo form_close(); ?>





</body>









</html>
