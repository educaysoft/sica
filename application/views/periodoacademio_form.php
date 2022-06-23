<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("periodoacademio/save") ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de periodoacademio"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("periodoacademio","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

