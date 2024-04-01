<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("repeticion/save") ?>
<?php echo form_hidden("idrepeticion")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Descripcion de repeticion"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("repeticion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

