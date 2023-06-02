<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($beneficiario))
{
?>
        <li> <?php echo anchor('beneficiario/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('beneficiario/anterior/'.$beneficiario['idbeneficiario'], 'anterior'); ?></li>
        <li> <?php echo anchor('beneficiario/siguiente/'.$beneficiario['idbeneficiario'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('beneficiario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('beneficiario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('beneficiario/edit/'.$beneficiario['idbeneficiario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('beneficiario/delete/'.$beneficiario['idbeneficiario'],'Delete'); ?></li>
        <li> <?php echo anchor('beneficiario/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('beneficiario/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('beneficiario/save_edit') ?>
<?php echo form_hidden('iddocumento',$beneficiario['iddocumento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id beneficiario:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idbeneficiario',$beneficiario['idbeneficiario'],array("disabled"=>"disabled",'placeholder'=>'Idbeneficiarios'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id documento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddocumento',$beneficiario['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/actual/'.$beneficiario['iddocumento'], 'Documento:'); ?></label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('iddocumento',$options[$beneficiario['iddocumento']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id persona:</label>
	<div class="col-md-10">
	<?php
     	 echo form_input('idpersona',$beneficiario['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idbeneficiarioes'));
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
echo form_input('idpersona',$options[$beneficiario['idpersona']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 

<?php echo form_close(); ?>





</body>









</html>
