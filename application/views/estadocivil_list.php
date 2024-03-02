<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('estadocivil/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($estadocivil_list as $list) { ?>
<tr>

<td> <?php echo $list->idestadocivil ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxestadocivil/'.$list->idestadocivil,'ver') ?> || <?php echo anchor('documento/add/'.$list->idestadocivil,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
