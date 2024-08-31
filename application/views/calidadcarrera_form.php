<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("calidadcarrera/save") ?>
<?php echo form_hidden("idcalidadcarrera")  ?>


<div class="form-group row">
<label class="col-md-2 col-form-label">Institución: </label>
<div class="col-md-10">
<?php
 


$options= array('--Select--');
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

echo form_dropdown("iddepartamento",$options, set_select('--Select--','default_value')); 

?>
</div>
</div>






<div class="form-group row">
<label class="col-md-2 col-form-label">Nombre: </label>
<div class="col-md-10">
<?php
     
     echo form_input("nombre","", array("placeholder"=>"Nombre de la artículo",'style'=>'width:500px;'));
?>
</div>
</div>




<div class="form-group row">
<label class="col-md-2 col-form-label">Detalle: </label>
<div class="col-md-10">
<?php
	

	
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle" );    
	
echo form_textarea("detalle","", $textarea_options);

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Archivo: </label>
<div class="col-md-10">
<?php
	
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle" );    
 echo form_textarea("archivo","", $textarea_options);  

?>
</div>
</div>





<div class="form-group row">
<label class="col-md-2 col-form-label">Criterio: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($criteriocalidads as $row){
	$options[$row->idcriteriocalidad]= $row->nombre;
}
 echo form_dropdown("idcriteriocalidad",$options, set_select('--Select--','default_value'),array('id'=>'idcriteriocalidad'));  
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Subcriterio: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($subcriteriocalidads as $row){
	$options[$row->idsubcriteriocalidad]= $row->nombre;
}
 echo form_dropdown("idsubcriteriocalidad",$options, set_select('--Select--','default_value'),array('id'=>'idsubcriteriocalidad'));  
?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Criterio: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($indicadorcalidads as $row){
	$options[$row->idindicadorcalidad]= $row->nombre;
}
 echo form_dropdown("idindicadorcalidad",$options, set_select('--Select--','default_value'),array('id'=>'idindicadorcalidad'));  
?>
</div>
</div>








<div class="form-group row">
<label class="col-md-2 col-form-label">Codigo: </label>
<div class="col-md-10">
<?php
     
     echo form_input("codigo","", array("placeholder"=>"codigo en el proceso",'style'=>'width:500px;'));
?>
</div>
</div>


<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("calidadcarrera","Atras") ?> </td>
</tr>




</table>
<?php echo form_close();?>

