<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($pagador))
{
?>
        <li> <?php echo anchor('pagador/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('pagador/anterior/'.$pagador['idpagador'], 'anterior'); ?></li>
        <li> <?php echo anchor('pagador/siguiente/'.$pagador['idpagador'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('pagador/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('pagador/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('pagador/edit/'.$pagador['idpagador'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('pagador/delete/'.$pagador['idpagador'],'Delete'); ?></li>
        <li> <?php echo anchor('pagador/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('pagador/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('pagador/save_edit') ?>
<?php echo form_hidden('iddocumento',$pagador['iddocumento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id pagador:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idpagador',$pagador['idpagador'],array("disabled"=>"disabled",'placeholder'=>'Idpagadors'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id documento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddocumento',$pagador['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/actual/'.$pagador['iddocumento'], 'Documento:'); ?></label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('iddocumento',$options[$pagador['iddocumento']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id persona:</label>
	<div class="col-md-10">
	<?php
     	 echo form_input('idpersona',$pagador['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idpagadores'));
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
echo form_input('idpersona',$options[$pagador['idpersona']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 

<?php echo form_close(); ?>





</body>









</html>
