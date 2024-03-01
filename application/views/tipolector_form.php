<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tipolector/save") ?>
<?php echo form_hidden("idtipolector")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Descripcion de tipolector"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tipolector","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

