<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('egresado/add', 'NUEVA EMISOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> idegresado</th>
<th> egresado</th>
<th> idtrabajo</th>
<th> idcompeximo</th>
</tr>
<tbody>
<?php  foreach($egresados as $list) { ?>
<tr>
<td> <?php echo $list->idegresado ?></td>
<td> <?php echo $list->elegresado ?></td>
<td> <?php echo $list->idtrabajointegracioncurricular ?></td>
<td> <?php echo $list->idexamencomplexivo ?></td>
<td> <?php echo anchor('egresado/edit/'.$list->idegresado,'Edit') ?> || <?php echo anchor('egresado/delete/'.$list->idegresado,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
