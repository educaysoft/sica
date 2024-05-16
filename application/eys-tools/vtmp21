<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("articulo/save") ?>
<?php echo form_hidden("idarticulo")  ?>
<table>

<tr>
<td> Institución: </td>
<td><?php 

$options= array('--Select--');
foreach ($instituciones as $row){
	$options[$row->idinstitucion]= $row->nombre;
}

 echo form_dropdown("idinstitucion",$options, set_select('--Select--','default_value'));  ?></td>
</tr>



<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de la artículo",'style'=>'width:500px;'))  ?></td>
</tr>


<tr>
<td> Detalle: </td>
<td><?php
	
	
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"detalle" );    
	
 echo form_textarea("detalle","", $textarea_options);  ?></td>
</tr>








<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("articulo","Atras") ?> </td>
</tr>




</table>
<?php echo form_close();?>

