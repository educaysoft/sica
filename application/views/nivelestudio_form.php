<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("nivelestudio/save") ?>
<?php echo form_hidden("idnivelestudio")  ?>
<table>



<tr>
<td> Número </td>
<td><?php echo form_input("numero","", array("placeholder"=>"Numero de nivelestudio"))  ?></td>
</tr>

<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de nivelestudio"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("nivelestudio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

