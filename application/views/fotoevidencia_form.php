<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("fotoevidencia/save") ?>
<?php echo form_hidden("idfotoevidencia")  ?>
<table>





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
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("fotoevidencia","Atras") ?> </td>
</tr>




</table>
<?php echo form_close();?>

