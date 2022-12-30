<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("institucion/save") ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de institucion"))  ?></td>
</tr>

<tr>
<td> Iniciales: </td>
<td><?php echo form_input("iniciales","", array("placeholder"=>"Iniciales de la institucion"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("institucion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

