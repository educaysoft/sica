<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("silabo/save") ?>
<table>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre del silabo:</label>
	<div class="col-md-10">
		<?php
 echo form_input("nombre","", array("placeholder"=>"Nombre de silabo",'style'=>'width:500px;'));
		?>
	</div> 
</div> 

<div class="form-group row">
<label class="col-md-2 col-form-label">Descripción :</label>
<div class="col-md-10">
<?php
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"descripcion",'id'=>'descripcion' );    
 echo form_textarea("descripcion","", $textarea_options); 
?>
</div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Periodo académico:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($periodoacademicos as $row){
	$options[$row->idperiodoacademico]= $row->nombrecorto;
}
echo form_dropdown("idperiodoacademico",$options,set_select('--Select--','default_value'));  	
?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Docente:</label>
	<div class="col-md-10">
		<?php
$options= array('--Select--');
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

echo form_dropdown("iddocente",$options,set_select('--Select--','default_value')); 

?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración del silabo:</label>
	<div class="col-md-10">
		<?php
 echo form_input("duracion","", array("placeholder"=>"Duracion del  silabo"));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Link detalle:</label>
	<div class="col-md-10">
		<?php
 echo form_input("linkdetalle","", array("placeholder"=>"Link de detalle"));
		?>
	</div> 
</div>



</table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("silabo","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

