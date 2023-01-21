<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tipodocumento/save") ?>
<?php echo form_hidden("idtipodocumento")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Descripcion de tipodocumento"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tipodocumento","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

