<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("perfil/save") ?>
<?php echo form_hidden("idperfil")  ?>
<table>



<tr>
<td> Id Perfil </td>
<td><?php echo form_input("idperfil","", array("placeholder"=>"idperfil"))  ?></td>
</tr>

<tr>
<td> Descripción </td>
<td><?php echo form_input("descripcion","", array("placeholder"=>"descripcion"))  ?></td>
</tr>

<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("perfil","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

