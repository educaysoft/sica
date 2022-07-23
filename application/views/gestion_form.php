<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("gestion/save") ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de gestion"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("gestion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

