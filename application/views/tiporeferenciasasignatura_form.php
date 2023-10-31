<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tiporeferenciasasignatura/save") ?>
<?php echo form_hidden("idtiporeferenciasasignatura")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de tiporeferenciasasignatura"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tiporeferenciasasignatura","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

