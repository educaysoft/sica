<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tipomatricula/save") ?>
<?php echo form_hidden("idtipomatricula")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Descripcion de tipomatricula"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tipomatricula","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

