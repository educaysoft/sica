<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tipopublicacion/save") ?>
<?php echo form_hidden("idtipopublicacion")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de tipopublicacion"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tipopublicacion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

