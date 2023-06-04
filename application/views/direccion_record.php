<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($direccion))
{
?>
        <li> <?php echo anchor('direccion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('direccion/anterior/'.$direccion['iddireccion'], 'anterior'); ?></li>
        <li> <?php echo anchor('direccion/siguiente/'.$direccion['iddireccion'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('direccion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('direccion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('direccion/edit/'.$direccion['iddireccion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('direccion/delete/'.$direccion['iddireccion'],'Delete'); ?></li>
        <li> <?php echo anchor('direccion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('direccion/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('direccion/save_edit') ?>
<?php echo form_hidden('iddireccion',$direccion['iddireccion']) ?>
<table>
  <tr>
     <td>Id Direccion:</td>
     <td><?php echo form_input('iddireccion',$direccion['iddireccion'],array("disabled"=>"disabled",'placeholder'=>'Iddireccions')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$direccion['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 



 
  <tr>
     <td>Direccion:</td>
     <td><?php echo form_input('nombre',$direccion['nombre'],array("disabled"=>"disabled",'placeholder'=>'Nombre')) ?></td>
  </tr>


  
<tr>
     <td>Estado del Direccion:</td>
     <td><?php 
$options= array("NADA");
foreach ($direccion_estados as $row){
	$options[$row->iddireccion_estado]= $row->nombre;
}

echo form_input('iddireccion_estado',$options[$direccion['iddireccion_estado']],array("disabled"=>"disabled")) ?></td>
  </tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
