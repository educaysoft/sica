<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($pertinencia))
{
?>
        <li> <?php echo anchor('pertinencia/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('pertinencia/anterior/'.$pertinencia['idpertinencia'], 'anterior'); ?></li>
        <li> <?php echo anchor('pertinencia/siguiente/'.$pertinencia['idpertinencia'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('pertinencia/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('pertinencia/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('pertinencia/edit/'.$pertinencia['idpertinencia'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('pertinencia/delete/'.$pertinencia['idpertinencia'],'Delete'); ?></li>
        <li> <?php echo anchor('pertinencia/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('pertinencia/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('pertinencia/save_edit') ?>
<?php echo form_hidden('iddepartamento',$pertinencia['iddepartamento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id pertinencia:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idpertinencia',$pertinencia['idpertinencia'],array("disabled"=>"disabled",'placeholder'=>'Idpertinencias','style'=>'width:600px;'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id estudio:</label>
	<div class="col-md-10">
	<?php
     	 echo form_input('idestudio',$pertinencia['idestudio'],array("disabled"=>"disabled",'placeholder'=>'Idpertinenciaes','style'=>'width:600px;'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Estudio:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($estudios as $row){
	$options[$row->idestudio]= $row->lapersona." -  ".$row->titulo;
}
echo form_input('idestudio',$options[$pertinencia['idestudio']],array("disabled"=>"disabled",'style'=>'width:600px;'));
	?>
	</div> 
</div> 







<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id departamento/carrera:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddepartamento',$pertinencia['iddepartamento'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentos','style'=>'width:600px;'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('departamento/actual/'.$pertinencia['iddepartamento'], 'Documento:'); ?></label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}
echo form_input('iddepartamento',$options[$pertinencia['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:600px;'));
	?>
	</div> 
</div> 


<?php echo form_close(); ?>





</body>









</html>
