<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("estadoasignaturadocente/save") ?>
<?php echo form_hidden("idestadoasignaturadocente")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de estadoasignaturadocente"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("estadoasignaturadocente","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

