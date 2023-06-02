<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tipopersona/save") ?>
<?php echo form_hidden("idtipopersona")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("descripcion","", array("placeholder"=>"Descripcion de tipopersona"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tipopersona","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

