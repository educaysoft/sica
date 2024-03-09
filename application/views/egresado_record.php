<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($egresado))
{
?>
        <li> <?php echo anchor('egresado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('egresado/anterior/'.$egresado['idegresado'], 'anterior'); ?></li>
        <li> <?php echo anchor('egresado/siguiente/'.$egresado['idegresado'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('egresado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('egresado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('egresado/edit/'.$egresado['idegresado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('egresado/delete/'.$egresado['idegresado'],'Delete'); ?></li>
        <li> <?php echo anchor('egresado/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('egresado/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('egresado/save_edit') ?>
<?php echo form_hidden('iddocumento',$egresado['iddocumento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id egresado:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idegresado',$egresado['idegresado'],array("disabled"=>"disabled",'placeholder'=>'Idegresados'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id documento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddocumento',$egresado['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/actual/'.$egresado['iddocumento'], 'Documento:'); ?></label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('iddocumento',$options[$egresado['iddocumento']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id persona:</label>
	<div class="col-md-10">
	<?php
     	 echo form_input('idpersona',$egresado['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idegresadoes'));
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
echo form_input('idpersona',$options[$egresado['idpersona']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 

<?php echo form_close(); ?>





</body>









</html>