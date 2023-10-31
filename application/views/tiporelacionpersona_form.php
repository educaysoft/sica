<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tiporelacionpersona/save") ?>
<?php echo form_hidden("idtiporelacionpersona")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de la Institucion"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tiporelacionpersona","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

