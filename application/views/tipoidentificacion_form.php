<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tipoidentificacion/save") ?>
<?php echo form_hidden("idtipoidentificacion")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Descripcion de tipoidentificacion"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tipoidentificacion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

