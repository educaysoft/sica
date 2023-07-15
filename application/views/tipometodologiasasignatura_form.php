<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tipometodologiasasignatura/save") ?>
<?php echo form_hidden("idtipometodologiasasignatura")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de tipometodologiasasignatura"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tipometodologiasasignatura","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

