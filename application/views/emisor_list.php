<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('emisor/add', 'NUEVA EMISOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> iddocumento</th>
<th> asunto</th>
<th> idemisor</th>
<th> emisor</th>
</tr>
<tbody>
<?php  foreach($emisor_list as $list) { ?>
<tr>
<td> <?php echo $list->iddocumento ?></td>
<td> <?php echo $list->asunto ?></td>
<td> <?php echo $list->idpersona ?></td>
<td> <?php echo $list->nombres ?></td>
<td> <?php echo anchor('emisor/edit/'.$list->iddocumento,'Edit') ?> || <?php echo anchor('emisor/delete/'.$list->iddocumento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
