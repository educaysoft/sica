<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('departamento/add', 'NUEVO DEPARTAMENTO'); ?>
<br>
<br>

<table border="1">
<tr>

<th> Unidad/Facultad:</th>
<th> ID DEPARTAMENTO/CARRERA</th>
<th> NOMBRE</th>
<th> #estudiantes</th>
</tr>
<tbody>
<?php  foreach($departamento_list as $list) { ?>
<tr>

<td> <?php echo $list->launidad ?></td>
<td> <?php echo $list->iddepartamento ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo $list->cantidad?></td>
<td> <?php echo anchor('departamento/edit/'.$list->iddepartamento,'Edit') ?> || <?php echo anchor('departamento/delete/'.$list->iddepartamento,'Delete') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
