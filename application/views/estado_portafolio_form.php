<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("estado_portafolio/save") ?>
<?php echo form_hidden("idestado_portafolio")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de la Estado_portafolio"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("estado_portafolio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

