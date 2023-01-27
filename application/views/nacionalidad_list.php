<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('nacionalidad/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($nacionalidad_list as $list) { ?>
<tr>

<td> <?php echo $list->idnacionalidad ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxnacionalidad/'.$list->idnacionalidad,'ver') ?> || <?php echo anchor('documento/add/'.$list->idnacionalidad,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
