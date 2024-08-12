<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("reunion/save") ?>
<?php echo form_hidden("idreunion")  ?>


<div class="form-group row">
<label class="col-md-2 col-form-label">Institución: </label>
<div class="col-md-10">
<?php
 


$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value')); 

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
<label class="col-md-2 col-form-label">Orden: </label>
<div class="col-md-10">
<?php
     
     echo form_input("orden","", array("placeholder"=>"orden en el proceso",'style'=>'width:500px;'));
?>
</div>
</div>


<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("reunion","Atras") ?> </td>
</tr>




</table>
<?php echo form_close();?>

