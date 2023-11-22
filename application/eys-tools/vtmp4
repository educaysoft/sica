<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('pertinencia/add', 'NUEVA EMISOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> iddocumento</th>
<th> asunto</th>
<th> idpertinencia</th>
<th> pertinencia</th>
</tr>
<tbody>
<?php  foreach($pertinencia_list as $list) { ?>
<tr>
<td> <?php echo $list->iddocumento ?></td>
<td> <?php echo $list->asunto ?></td>
<td> <?php echo $list->idpersona ?></td>
<td> <?php echo $list->elpertinencia ?></td>
<td> <?php echo anchor('pertinencia/edit/'.$list->iddocumento,'Edit') ?> || <?php echo anchor('pertinencia/delete/'.$list->iddocumento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
