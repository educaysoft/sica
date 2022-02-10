<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("documento_estado/save") ?>
<?php echo form_hidden("iddocumento_estado")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de documento_estado"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("documento_estado","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

