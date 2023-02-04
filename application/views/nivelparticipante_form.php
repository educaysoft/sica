<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("nivelparticipante/save") ?>
<?php echo form_hidden("idnivelparticipante")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de nivelparticipante"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("nivelparticipante","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

