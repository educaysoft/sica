<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('canton/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($canton_list as $list) { ?>
<tr>

<td> <?php echo $list->idcanton ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxcanton/'.$list->idcanton,'ver') ?> || <?php echo anchor('documento/add/'.$list->idcanton,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
