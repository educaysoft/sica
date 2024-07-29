<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('lector/add', 'NUEVO DESTINATARIO'); ?>
<br>
<br>

<table border="1">
<tr>
<th> iddocumento</th>
<th> asunto</th>
<th> idemisor</th>
<th> lector</th>
</tr>
<tbody>
<?php  foreach($lector_list as $list) { ?>
<tr>
<td> <?php echo $list->iddocumento ?></td>
<td> <?php echo $list->asunto ?></td>
<td> <?php echo $list->idpersona ?></td>
<td> <?php echo $list->nombres ?></td>
<td> <?php echo anchor('lector/edit/'.$list->iddocumento,'Edit') ?> || <?php echo anchor('lector/delete/'.$list->iddocumento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
