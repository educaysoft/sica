<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('tutorexamencomplexivo/add', 'NUEVO DESTINATARIO'); ?>
<br>
<br>

<table border="1">
<tr>
<th> iddocumento</th>
<th> asunto</th>
<th> idemisor</th>
<th> tutorexamencomplexivo</th>
</tr>
<tbody>
<?php  foreach($tutorexamencomplexivo_list as $list) { ?>
<tr>
<td> <?php echo $list->iddocumento ?></td>
<td> <?php echo $list->asunto ?></td>
<td> <?php echo $list->idpersona ?></td>
<td> <?php echo $list->nombres ?></td>
<td> <?php echo anchor('tutorexamencomplexivo/edit/'.$list->iddocumento,'Edit') ?> || <?php echo anchor('tutorexamencomplexivo/delete/'.$list->iddocumento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
