<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('pagador/add', 'NUEVA EMISOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> iddocumento</th>
<th> asunto</th>
<th> idpagador</th>
<th> pagador</th>
</tr>
<tbody>
<?php  foreach($pagador_list as $list) { ?>
<tr>
<td> <?php echo $list->iddocumento ?></td>
<td> <?php echo $list->asunto ?></td>
<td> <?php echo $list->idpersona ?></td>
<td> <?php echo $list->nombres ?></td>
<td> <?php echo anchor('pagador/edit/'.$list->iddocumento,'Edit') ?> || <?php echo anchor('pagador/delete/'.$list->iddocumento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
