<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($emisor))
{
?>
        <li> <?php echo anchor('emisor/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('emisor/anterior/'.$emisor['idemisor'], 'anterior'); ?></li>
        <li> <?php echo anchor('emisor/siguiente/'.$emisor['idemisor'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('emisor/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('emisor/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('emisor/edit/'.$emisor['idemisor'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('emisor/delete/'.$emisor['idemisor'],'Delete'); ?></li>
        <li> <?php echo anchor('emisor/listar/','Listar'); ?></li>


<?php 
}else{
?>

        <li> <?php echo anchor('emisor/add', 'Nuevo'); ?></li>
<?php
}
?>
 


    </ul>
</div>
<br>
<br>

<?php echo form_open('emisor/save_edit') ?>
<?php echo form_hidden('iddocumento',$emisor['iddocumento']) ?>
<table>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id emisor:</label>
	<div class="col-md-10">
	<?php
      echo form_input('idemisor',$emisor['idemisor'],array("disabled"=>"disabled",'placeholder'=>'Idemisors'));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id documento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddocumento',$emisor['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentos'));
	?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documento/actual/'.$emisor['iddocumento'], 'Documento:'); ?></label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('iddocumento',$options[$emisor['iddocumento']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id persona:</label>
	<div class="col-md-10">
	<?php
     	 echo form_input('idpersona',$emisor['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idemisores'));
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
echo form_input('idpersona',$options[$emisor['idpersona']],array("disabled"=>"disabled"));
	?>
	</div> 
</div> 

<?php echo form_close(); ?>





</body>









</html>
