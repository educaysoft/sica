<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('tipopersona/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($tipopersona_list as $list) { ?>
<tr>

<td> <?php echo $list->idtipopersona ?></td>
<td> <?php echo $list->descripcion?></td>
<td> <?php echo $list->cantidad?></td>
<td> <?php echo anchor('documento/listarxtipopersona/'.$list->idtipopersona,'ver') ?> || <?php echo anchor('documento/add/'.$list->idtipopersona,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
