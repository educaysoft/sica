<h2> <?php echo $title; ?></h2>
<hr />
<?php echo anchor('informe/add','NEW GENERO'); ?>
<br/>
<br>
<table border="1">
 <thead>
 <tr>
 <th>ID</th>
 <th>NOMBRE</th>
 <th>DESCRIPCION</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($informe_list as $list) { ?>
 <tr>
 <td><?php echo $list->idinforme ?></td>
 <td><?php echo $list->nombre ?></td>
 <td><?php echo $list->descripcion ?></td>
 <td> <?php echo anchor('informe/edit/'.$list->idinforme,'Edit') ?> || <?php echo anchor('informe/delete/'.$list->idinforme,'Delete') ?> || <?php echo anchor('informe/imprimir/'.$list->idinforme,'Imprimir') ?></td>
 </tr>
 <?php } ?> 
 </tbody>
</table>
