<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("foto/save") ?>
<?php echo form_hidden("idfoto")  ?>
<table>





<tr>
<td> Descripcion: </td>
<td><?php echo form_input("descripcion","", array("placeholder"=>"Descripción corta de la foto"))  ?></td>
</tr>

<tr>
<td> Detalle: </td>
<td><?php echo form_input("detalle","", array("placeholder"=>"Detalle de la foto"))  ?></td>
</tr>

<tr>
<td> Archivo: </td>
<td><?php echo form_input("archivo","", array("placeholder"=>"Archivo de la foto"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("foto","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

