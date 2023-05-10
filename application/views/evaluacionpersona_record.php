<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($evaluacionpersona))
{
?>
        <li> <?php echo anchor('evaluacionpersona/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('evaluacionpersona/anterior/'.$evaluacionpersona['idevaluacionpersona'], 'anterior'); ?></li>
        <li> <?php echo anchor('evaluacionpersona/siguiente/'.$evaluacionpersona['idevaluacionpersona'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('evaluacionpersona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('evaluacionpersona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('evaluacionpersona/edit/'.$evaluacionpersona['idevaluacionpersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('evaluacionpersona/delete/'.$evaluacionpersona['idevaluacionpersona'],'Delete'); ?></li>
        <li> <?php echo anchor('evaluacionpersona/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('evaluacionpersona/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('evaluacionpersona/save_edit') ?>
<?php echo form_hidden('idevaluacionpersona',$evaluacionpersona['idevaluacionpersona']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evaluacionpersona:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idevaluacionpersona',$evaluacionpersona['idevaluacionpersona'],array("disabled"=>"disabled",'placeholder'=>'Idevaluacionpersonas'));
	?>
	</div> 
</div> 





 



 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id persona:</label>
	<div class="col-md-10">
	<?php
     	 echo form_input('idpersona',$evaluacionpersona['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idevaluacionpersonaes'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Persona:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}
echo form_input('idpersona',$options[$evaluacionpersona['idpersona']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de nacimiento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('fecha',$evaluacionpersona['fecha'],array("disabled"=>"disabled",'placeholder'=>'Fechanacimiento')) ;

	?>
	</div> 
</div>


<?php echo form_close(); ?>





</body>









</html>
