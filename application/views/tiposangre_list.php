<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('tiposangre/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($tiposangre_list as $list) { ?>
<tr>

<td> <?php echo $list->idtiposangre ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxtiposangre/'.$list->idtiposangre,'ver') ?> || <?php echo anchor('documento/add/'.$list->idtiposangre,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
