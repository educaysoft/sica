<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('sexo/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($sexo_list as $list) { ?>
<tr>

<td> <?php echo $list->idsexo ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxsexo/'.$list->idsexo,'ver') ?> || <?php echo anchor('documento/add/'.$list->idsexo,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
