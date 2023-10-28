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
<?php echo form_hidden('iddocumento',$pertinencia['iddocumento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id pertinencia:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idpertinencia',$pertinencia['idpertinencia'],array("disabled"=>"disabled",'placeholder'=>'Idpertinencias'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id documento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddocumento',$pertinencia['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/actual/'.$pertinencia['iddocumento'], 'Documento:'); ?></label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('iddocumento',$options[$pertinencia['iddocumento']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id persona:</label>
	<div class="col-md-10">
	<?php
     	 echo form_input('idpersona',$pertinencia['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idpertinenciaes'));
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
echo form_input('idpersona',$options[$pertinencia['idpersona']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 

<?php echo form_close(); ?>





</body>









</html>
