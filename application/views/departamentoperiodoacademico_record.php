<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('departamentoperiodoacademico/save_edit') ?>
    <ul>
<?php
if(isset($departamentoperiodoacademico))
{
?>
 
        <li> <?php echo anchor('departamentoperiodoacademico/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/anterior/'.$departamentoperiodoacademico['iddepartamentoperiodoacademico'], 'anterior'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/siguiente/'.$departamentoperiodoacademico['iddepartamentoperiodoacademico'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('departamentoperiodoacademico/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/edit/'.$departamentoperiodoacademico['iddepartamentoperiodoacademico'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('departamentoperiodoacademico/delete/'.$departamentoperiodoacademico['iddepartamentoperiodoacademico'],'Delete'); ?></li>
        <li> <?php echo anchor('departamentoperiodoacademico/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('departamentoperiodoacademico/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>




 




 


 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id departamento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddepartamento',$departamentoperiodoacademico['iddepartamento'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentoperiodoacademicoes','style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Docente:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->eldepartamento;
}
echo form_input('nombre',$options[$departamentoperiodoacademico['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 
 
  


<div class="form-group row">
    <label class="col-md-2 col-form-label">Periodo académico:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}
echo form_input('idperiodoacademico',$options[$departamentoperiodoacademico['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div>





<?php echo form_close(); ?>





</body>









</html>
