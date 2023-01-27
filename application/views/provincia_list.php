<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('provincia/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($provincia_list as $list) { ?>
<tr>

<td> <?php echo $list->idprovincia ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxprovincia/'.$list->idprovincia,'ver') ?> || <?php echo anchor('documento/add/'.$list->idprovincia,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
