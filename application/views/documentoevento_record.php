<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('documentoevento/save_edit') ?>
    <ul>
<?php
if(isset($documentoevento))
{
?>
 
        <li> <?php echo anchor('documentoevento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documentoevento/anterior/'.$documentoevento['iddocumentoevento'], 'anterior'); ?></li>
        <li> <?php echo anchor('documentoevento/siguiente/'.$documentoevento['iddocumentoevento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documentoevento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('documentoevento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('documentoevento/edit/'.$documentoevento['iddocumentoevento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('documentoevento/delete/'.$documentoevento['iddocumentoevento'],'Delete'); ?></li>
        <li> <?php echo anchor('documentoevento/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('documentoevento/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$documentoevento['idevento']) ?>


 




<div class="form-group row">
<label class="col-md-2 col-form-label"><?php echo anchor('evento/actual/'.$documentoevento['idevento'],'Id evento:'); ?> </label>
	<div class="col-md-10">
	<?php
      echo form_input('idevento',$documentoevento['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos','style'=>'width:500px;'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del evento:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
echo form_input('idevento',$options[$documentoevento['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipodocu/elprimero/', 'Tipo documento'); ?> :</label>
     	<?php 
	$options= array("NADA");
	foreach ($tipodocus as $row){
		$options[$row->idtipodocu]= $row->descripcion;
	}
	$arrdatos=array('name'=>'idtipodocu','value'=>$options[$documentoevento['idtipodocu']],"disabled"=>"disabled","style"=>"width:500px");
	?>
	<div class="col-md-10">
		<?php
			echo form_input($arrdatos) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id documento:</label>
	<div class="col-md-10">
	<?php
      echo form_input('iddocumento',$documentoevento['iddocumento'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentoeventoes','style'=>'width:500px;'));
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Documento:</label>
	<div class="col-md-10">
	<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('nombre',$options[$documentoevento['iddocumento']],array("disabled"=>"disabled",'style'=>'width:500px;'));
		?>
	</div> 
</div> 
 
  








<?php echo form_close(); ?>





</body>









</html>
