<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("maestria/save") ?>
<?php echo form_hidden("idmaestria")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de maestria"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("maestria","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

