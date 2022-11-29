<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("paralelo/save") ?>
<?php echo form_hidden("idparalelo")  ?>
<table>



<tr>
<td> Número </td>
<td><?php echo form_input("numero","", array("placeholder"=>"Numero de paralelo"))  ?></td>
</tr>

<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de paralelo"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("paralelo","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

