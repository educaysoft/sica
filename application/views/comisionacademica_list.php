<html>


<body>

<h2> <?php echo $title;  ?></h2>
<hr/>
<?php echo anchor('comisionacademica/add', 'NUEVO ORDENADOR'); ?>
<br>
<br>

<table border="1">
<tr>
<th> ID ORDENADOR</th>
<th> DESCRIPCION</th>
<th> cantidad</th>
</tr>
<tbody>
<?php  foreach($comisionacademica_list as $list) { ?>
<tr>

<td> <?php echo $list->idcomisionacademica ?></td>
<td> <?php echo $list->nombre?></td>
<td> <?php echo anchor('documento/listarxcomisionacademica/'.$list->idcomisionacademica,'ver') ?> || <?php echo anchor('documento/add/'.$list->idcomisionacademica,'Nuevo') ?></td>
 </tr>


<?php } ?>

</tbody>
</table>








</body>









</html>
