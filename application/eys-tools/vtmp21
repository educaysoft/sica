
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("documentosilabo/save") ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Silabo:</label>
	<div class="col-md-10">
		<?php
	$options= array('--Select--');
	foreach ($silabos as $row){
		$options[$row->idsilabo]=$row->idsilabo.' - '.$row->nombre;
	}

	 echo form_dropdown("idsilabo",$options, set_select('--Select--','default_value'));  
		?>
	</div> 
</div> 


<div class="form-group row">
<label class="col-md-2 col-form-label">Tipo de documento:</label>
<div class="col-md-10">
<?php
    $options= array('--Select--');
    foreach ($tipodocus as $row){
      $options[$row->idtipodocu]= $row->descripcion;
    }
     echo form_dropdown("idtipodocu",$options, set_select('--Select--','default_value'),array('id'=>'idtipodocu')); 
?>
</div>
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Documento:</label>
	<div class="col-md-10">
	<?php
	$options= array('--Select--');
	foreach ($documentos as $row){
		$options[$row->iddocumento]=$row->iddocumento.' - '.$row->asunto;
	}
	 echo form_dropdown("iddocumento",$options, set_select('--Select--','default_value')); 
		?>
	</div> 
</div> 


 


 


<table>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("documentosilabo","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

