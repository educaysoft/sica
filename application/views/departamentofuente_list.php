<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('departamentofuente/add', 'NUEVA EMISOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> iddocumento</th>
<th> asunto</th>
<th> iddepartamentofuente</th>
<th> departamentofuente</th>
</tr>
<tbody>
<?php  foreach($departamentofuente_list as $list) { ?>
<tr>
<td> <?php echo $list->iddocumento ?></td>
<td> <?php echo $list->asunto ?></td>
<td> <?php echo $list->idpersona ?></td>
<td> <?php echo $list->eldepartamentofuente ?></td>
<td> <?php echo anchor('departamentofuente/edit/'.$list->iddocumento,'Edit') ?> || <?php echo anchor('departamentofuente/delete/'.$list->iddocumento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
