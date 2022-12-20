<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("codigoqr/save") ?>
<?php echo form_hidden("idcodigoqr")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de codigoqr"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("codigoqr","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

