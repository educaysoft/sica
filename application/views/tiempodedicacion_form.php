<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("tiempodedicacion/save") ?>
<?php echo form_hidden("idtiempodedicacion")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de tiempodedicacion"))  ?></td>
</tr>

<tr>
<td> Inicial </td>
<td><?php echo form_input("inicial","", array("placeholder"=>"incial de tiempodedicacion"))  ?></td>
</tr>



<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("tiempodedicacion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

