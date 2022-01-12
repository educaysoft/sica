<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("evaluacion/save") ?>
<?php echo form_hidden("idevaluacion")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de la Evaluacion"))  ?></td>
</tr>


<tr>
<td> Detalle: </td>
<td><?php echo form_input("detalle","", array("placeholder"=>"Detalle de la Evaluacion"))  ?></td>
</tr>

<tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("evaluacion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

