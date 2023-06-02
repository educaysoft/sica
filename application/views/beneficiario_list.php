<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('beneficiario/add', 'NUEVA EMISOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> iddocumento</th>
<th> asunto</th>
<th> idbeneficiario</th>
<th> beneficiario</th>
</tr>
<tbody>
<?php  foreach($beneficiario_list as $list) { ?>
<tr>
<td> <?php echo $list->iddocumento ?></td>
<td> <?php echo $list->asunto ?></td>
<td> <?php echo $list->idpersona ?></td>
<td> <?php echo $list->nombres ?></td>
<td> <?php echo anchor('beneficiario/edit/'.$list->iddocumento,'Edit') ?> || <?php echo anchor('beneficiario/delete/'.$list->iddocumento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
