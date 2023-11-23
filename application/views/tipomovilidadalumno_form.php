<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tipomovilidadalumno/save") ?>
<?php echo form_hidden("idtipomovilidadalumno")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de tipomovilidadalumno"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tipomovilidadalumno","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

