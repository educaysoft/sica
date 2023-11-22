<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('departamentodestino/add', 'NUEVA EMISOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> iddocumento</th>
<th> asunto</th>
<th> iddepartamentodestino</th>
<th> departamentodestino</th>
</tr>
<tbody>
<?php  foreach($departamentodestino_list as $list) { ?>
<tr>
<td> <?php echo $list->iddocumento ?></td>
<td> <?php echo $list->asunto ?></td>
<td> <?php echo $list->idpersona ?></td>
<td> <?php echo $list->eldepartamentodestino ?></td>
<td> <?php echo anchor('departamentodestino/edit/'.$list->iddocumento,'Edit') ?> || <?php echo anchor('departamentodestino/delete/'.$list->iddocumento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
