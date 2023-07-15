<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("metodoaprendizaje/save") ?>
<?php echo form_hidden("idmetodoaprendizaje")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de metodoaprendizaje"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("metodoaprendizaje","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

