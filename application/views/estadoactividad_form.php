<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("estadoactividad/save") ?>
<?php echo form_hidden("idestadoactividad")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de estadoactividad"))  ?></td>
</tr>

<tr>
<td> Color: </td>
<td><?php echo form_input("color","", array("placeholder"=>"Color de estadoactividad"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("estadoactividad","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

