
<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open("documentoevento/save") ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Evento:</label>
	<div class="col-md-10">
		<?php
	$options= array('--Select--');
	foreach ($eventos as $row){
		$options[$row->idevento]=$row->idevento.' - '.$row->titulo;
	}

	 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'));  
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
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("documentoevento","Atrás") ?> </td>
</tr>

</table>
<?php echo form_close();?>

