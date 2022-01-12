<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($correo))
{
?>
        <li> <?php echo anchor('correo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('correo/anterior/'.$correo['idcorreo'], 'anterior'); ?></li>
        <li> <?php echo anchor('correo/siguiente/'.$correo['idcorreo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('correo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('correo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('correo/edit/'.$correo['idcorreo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('correo/delete/'.$correo['idcorreo'],'Delete'); ?></li>
        <li> <?php echo anchor('correo/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('correo/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('correo/save_edit') ?>
<?php echo form_hidden('idcorreo',$correo['idcorreo']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('idcorreo',$correo['idcorreo'],array("disabled"=>"disabled",'placeholder'=>'Idcorreos')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$correo['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 



 
  <tr>
     <td>Correo:</td>
     <td><?php echo form_input('nombre',$correo['nombre'],array("disabled"=>"disabled",'placeholder'=>'Nombre')) ?></td>
  </tr>


  
<tr>
     <td>Estado del Correo:</td>
     <td><?php 
$options= array("NADA");
foreach ($correo_estados as $row){
	$options[$row->idcorreo_estado]= $row->nombre;
}

echo form_input('idcorreo_estado',$options[$correo['idcorreo_estado']],array("disabled"=>"disabled")) ?></td>
  </tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
