<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('tipodocu/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($tipodocu_list as $list) { ?>
<tr>

<td> <?php echo $list->idtipodocu ?></td>
<td> <?php echo $list->descripcion?></td>
<td> <?php echo $list->cantidad?></td>
<td> <?php echo anchor('documento/listarxtipodocu/'.$list->idtipodocu,'ver') ?> || <?php echo anchor('tipodocu/delete/'.$list->idtipodocu,'Eliminar') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
