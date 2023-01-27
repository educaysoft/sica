<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("provincia/save") ?>
<?php echo form_hidden("idprovincia")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Descripcion de provincia"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("provincia","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

