<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("destinodocumento/save") ?>
<table>

<tr>
<td> Id </td>
<td><?php echo form_input("iddestinodocumento","", array("value"=>0, "placeholder"=>"este valor es 0 "))  ?></td>
</tr>



<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de destinodocumento"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("destinodocumento","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

