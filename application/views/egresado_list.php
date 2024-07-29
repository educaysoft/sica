<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('egresado/add', 'NUEVA EMISOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> iddocumento</th>
<th> asunto</th>
<th> idegresado</th>
<th> egresado</th>
</tr>
<tbody>
<?php  foreach($egresados as $list) { ?>
<tr>
<td> <?php echo $list->iddocumento ?></td>
<td> <?php echo $list->asunto ?></td>
<td> <?php echo $list->idpersona ?></td>
<td> <?php echo $list->elegresado ?></td>
<td> <?php echo anchor('egresado/edit/'.$list->iddocumento,'Edit') ?> || <?php echo anchor('egresado/delete/'.$list->iddocumento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
