<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("nivelacceso/save") ?>
<?php echo form_hidden("idnivelacceso")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Nombre del nivel de acceso"))  ?></td>
</tr>


<tr>
<td> Crear: </td>
<td><?php echo form_input("create","", array("placeholder"=>"0 o 1"))  ?></td>
</tr>

<tr>
<td> Lectura </td>
<td><?php echo form_input("read","", array("placeholder"=>"0 o 1"))  ?></td>
</tr>

<tr>
<td> Actualizar: </td>
<td><?php echo form_input("update","", array("placeholder"=>"0 o 1"))  ?></td>
</tr>

<tr>
<td> Borrar: </td>
<td><?php echo form_input("delete","", array("placeholder"=>"0 o 1"))  ?></td>
</tr>

<tr>
<td> Navegar: </td>
<td><?php echo form_input("navegar","", array("placeholder"=>"0 o 1"))  ?></td>
</tr>


<tr>
<td> Modulo de inicio: </td>
<td><?php echo form_input("inicio","", array("placeholder"=>"Modulo con el que inicia"))  ?></td>
</tr>









<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("nivelacceso","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

