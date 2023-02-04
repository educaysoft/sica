<!--Arhivo: modeevaluacion_form.php -->
<!--Modulo: modoevaluacion -->
<!--Descripción: vista que permite ingresar nueva información del modo de evaluacion -->
<!--Autor: Stalin Francis -->
<!--Fecha: Ultima evaluación: Sabado 4 febrero 2023 -->


<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("modoevaluacion/save") ?>
<?php echo form_hidden("idmodoevaluacion")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre de modoevaluacion"))  ?></td>
</tr>

<tr>
<td> Ponderacion </td>
<td><?php echo form_input("ponderacion","", array("placeholder"=>"Ponderación del modoevaluacion"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("modoevaluacion","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

