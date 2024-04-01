<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('repeticion/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($repeticion_list as $list) { ?>
<tr>

<td> <?php echo $list->idrepeticion ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxrepeticion/'.$list->idrepeticion,'ver') ?> || <?php echo anchor('documento/add/'.$list->idrepeticion,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
