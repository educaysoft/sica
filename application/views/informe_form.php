<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("informe/save") ?>
<?php echo form_hidden("idinforme")  ?>
<table>



<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre"))  ?></td>
</tr>


<tr>
<td> Descripción </td>
<td><?php echo form_input("descripcion","", array("placeholder"=>"descripcion"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("informe","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

