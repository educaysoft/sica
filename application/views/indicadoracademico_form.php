<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("indicadoracademico/save") ?>
<?php echo form_hidden("idindicadoracademico")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de indicadoracademico"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("indicadoracademico","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

