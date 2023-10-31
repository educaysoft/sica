<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("comisionacademica/save") ?>
<?php echo form_hidden("idcomisionacademica")  ?>
<table>





<tr>
<td> Nombre </td>
<td><?php echo form_input("nombre","", array("placeholder"=>"Descripcion de comisionacademica"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("comisionacademica","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

