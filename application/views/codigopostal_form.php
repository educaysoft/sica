<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("codigopostal/save") ?>
<?php echo form_hidden("idcodigopostal")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Descripcion de codigopostal"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("codigopostal","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

