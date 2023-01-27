<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('tipodocumento/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($tipodocumento_list as $list) { ?>
<tr>

<td> <?php echo $list->idtipodocumento ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxtipodocumento/'.$list->idtipodocumento,'ver') ?> || <?php echo anchor('documento/add/'.$list->idtipodocumento,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
