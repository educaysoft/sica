<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('directorio/add', 'NUEVO DIRECTORIO'); ?>
<br>
<br>

<table border="1">
<tr>

<th> ID DIRECTORIO</th>
<th> NOMBRE</th>
</tr>
<tbody>
<?php  foreach($directorio_list as $list) { ?>
<tr>

<td> <?php echo $list->iddirectorio ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('directorio/edit/'.$list->iddirectorio,'Editar') ?> || <?php echo anchor('directorio/delete/'.$list->iddirectorio,'Eliminar') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
