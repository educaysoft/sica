<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('tipomatricula/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($tipomatricula_list as $list) { ?>
<tr>

<td> <?php echo $list->idtipomatricula ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxtipomatricula/'.$list->idtipomatricula,'ver') ?> || <?php echo anchor('documento/add/'.$list->idtipomatricula,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
