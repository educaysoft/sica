<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("telefono_estado/save") ?>
<?php echo form_hidden("idtelefono_estado")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de telefono_estado"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("telefono_estado","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

