<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('pais/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($pais_list as $list) { ?>
<tr>

<td> <?php echo $list->idpais ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxpais/'.$list->idpais,'ver') ?> || <?php echo anchor('pais/add/','Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
