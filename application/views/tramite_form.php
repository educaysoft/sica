<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tramite/save") ?>
<?php echo form_hidden("idtramite")  ?>



<div class="form-group row">
<label class="col-md-2 col-form-label">Intitucion:</label>
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
<label class="col-md-2 col-form-label">Tramite:</label>
<div class="col-md-10">
<?php
 echo form_input("nombre","", array("placeholder"=>"Nombre de la artículo",'style'=>'width:500px;')); 

?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Solicitante:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($personas as $row){
	$options[$row->idpersona]=$row->apellidos." - ".$row->nombres;
}
 echo form_dropdown("idpersona",$options,set_select('--Select--','default_value'), array('id'=>'idpersona'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Detalle:</label>
<div class="col-md-10">
<?php

	
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle" );    
	
echo form_textarea("detalle","", $textarea_options); 
?>
</div>
</div>





<table>
<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tramite","Atras") ?> </td>
</tr>




</table>
<?php echo form_close();?>

