<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('genero/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($generos as $list) { ?>
<tr>

<td> <?php echo $list->idgenero ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxgenero/'.$list->idgenero,'ver') ?> || <?php echo anchor('documento/add/'.$list->idgenero,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
