<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('unidad/add', 'NUEVA UNIDAD'); ?>
<br>
<br>

<table border="1">
<tr>

<th> ID UNIDAD</th>
<th> NOMBRE</th>
</tr>
<tbody>
<?php  foreach($unidad_list as $list) { ?>
<tr>

<td> <?php echo $list->idunidad ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('unidad/edit/'.$list->idunidad,'Editar') ?> || <?php echo anchor('unidad/delete/'.$list->idunidad,'Eliminar') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
