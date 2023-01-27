<h2> <?php echo $title; ?> </h2>
<hr/>
<?php echo form_open("codigoqr/save") ?>
<?php echo form_hidden("idcodigoqr")  ?>
<table>





<tr>
<td> filename </td>
<td><?php echo form_input("filename","", array("placeholder"=>"Nombre de archivo"))  ?></td>
</tr>

<tr>
<td> tamaño(10): </td>
<td><?php echo form_input("tamanio","", array("placeholder"=>"tamaño"))  ?></td>
</tr>

<tr>
<td> level(M): </td>
<td><?php echo form_input("level","", array("placeholder"=>"level"))  ?></td>
</tr>

<tr>
<td> framasize(3): </td>
<td><?php echo form_input("framesize","", array("placeholder"=>"framesize"))  ?></td>
</tr>

<tr>
<td> contenidos(web): </td>
<td><?php echo form_input("contenido","", array("placeholder"=>"contenido"))  ?></td>
</tr>


<tr>
<td colspan="2"> <hr><?php echo form_submit("submit", "Guardar"); ?><?php echo anchor("codigoqr","Atras") ?> </td>
</tr>

</table>
<?php echo form_close();?>

