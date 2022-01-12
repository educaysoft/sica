<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($ascenso))
{
?>
        <li> <?php echo anchor('ascenso/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('ascenso/anterior/'.$ascenso['idascenso'], 'anterior'); ?></li>
        <li> <?php echo anchor('ascenso/siguiente/'.$ascenso['idascenso'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ascenso/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ascenso/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ascenso/edit/'.$ascenso['idascenso'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ascenso/delete/'.$ascenso['idascenso'],'Delete'); ?></li>
        <li> <?php echo anchor('ascenso/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('ascenso/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('ascenso/save_edit') ?>
<?php echo form_hidden('idascenso',$ascenso['idascenso']) ?>
<table>

<tr>
     <td>Evento:</td>
     <td><?php 
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$ascenso['idevento']],array("disabled"=>"disabled")) ?></td>
  </tr>


  <tr>
     <td>Id Acceso:</td>
     <td><?php echo form_input('idascenso',$ascenso['idascenso'],array("disabled"=>"disabled",'placeholder'=>'Idascensos')) ?></td>
  </tr>
 
 
<tr>
     <td>Cliente:</td>
     <td><?php 
$options= array("NADA");
foreach ($clientes as $row){
	$options[$row->idcliente]= $row->elcliente;
}

echo form_input('idcliente',$options[$ascenso['idcliente']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 

  




<tr>
     <td>Cinturon:</td>
     <td><?php 
$options= array("NADA");
foreach ($cinturones as $row){
	$options[$row->idcinturon]= $row->color;
}

echo form_input('idcinturon',$options[$ascenso['idcinturon']],array("disabled"=>"disabled")) ?></td>
  </tr>





</table>
<?php echo form_close(); ?>





</body>









</html>
