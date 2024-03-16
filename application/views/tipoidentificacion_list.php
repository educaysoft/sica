<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('tipoidentificacion/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($tipoidentificacion_list as $list) { ?>
<tr>

<td> <?php echo $list->idtipoidentificacion ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxtipoidentificacion/'.$list->idtipoidentificacion,'ver') ?> || <?php echo anchor('documento/add/'.$list->idtipoidentificacion,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
