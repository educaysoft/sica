<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("modulo/save") ?>
<?php echo form_hidden("idmodulo")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de la Modulo"))  ?></td>
</tr>

<tr>
<td> modulo: </td>
<td><?php echo form_input("modulo","", array("placeholder"=>"Nombre del modulo"))  ?></td>
</tr>

<tr>
<td> Funcion </td>
<td><?php echo form_input("funcion","", array("placeholder"=>"Nombre de la funcion"))  ?></td>
</tr>



<tr>
<td> Icono: </td>
<td><?php echo form_input("icono","", array("placeholder"=>"Nombre del archivo icono"))  ?></td>
</tr>


<tr>
<td> Inicial: </td>
<td><?php echo form_input("inicial","", array("placeholder"=>"Iniciales del módulo"))  ?></td>
</tr>


<tr>
<td> Descripcion: </td>
<td><?php



$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"descripcionn" );    
	
echo form_textarea("descripcionn","", $textarea_options);




?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("modulo","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

