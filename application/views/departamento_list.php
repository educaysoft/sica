<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('departamento/add', 'NUEVO DEPARTAMENTO'); ?>
<br>
<br>

<table border="1">
<tr>

<th> ID DEPARTAMENTO</th>
<th> NOMBRE</th>
</tr>
<tbody>
<?php  foreach($departamento_list as $list) { ?>
<tr>

<td> <?php echo $list->iddepartamento ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('departamento/edit/'.$list->iddepartamento,'Edit') ?> || <?php echo anchor('departamento/delete/'.$list->iddepartamento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
