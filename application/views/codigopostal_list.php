<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('codigopostal/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($codigopostal_list as $list) { ?>
<tr>

<td> <?php echo $list->idcodigopostal ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxcodigopostal/'.$list->idcodigopostal,'ver') ?> || <?php echo anchor('documento/add/'.$list->idcodigopostal,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
