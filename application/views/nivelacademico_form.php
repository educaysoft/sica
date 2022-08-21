<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("nivelacademico/save") ?>
<?php echo form_hidden("idnivelacademico")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de nivelacademico"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("nivelacademico","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

