<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('areaacademica/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($areaacademica_list as $list) { ?>
<tr>

<td> <?php echo $list->idareaacademica ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxareaacademica/'.$list->idareaacademica,'ver') ?> || <?php echo anchor('documento/add/'.$list->idareaacademica,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
