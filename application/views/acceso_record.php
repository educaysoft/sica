<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($acceso))
{
?>
        <li> <?php echo anchor('acceso/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('acceso/anterior/'.$acceso['idacceso'], 'anterior'); ?></li>
        <li> <?php echo anchor('acceso/siguiente/'.$acceso['idacceso'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('acceso/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('acceso/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('acceso/edit/'.$acceso['idacceso'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('acceso/delete/'.$acceso['idacceso'],'Delete'); ?></li>
        <li> <?php echo anchor('acceso/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('acceso/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('acceso/save_edit') ?>
<?php echo form_hidden('idacceso',$acceso['idacceso']) ?>
<table>
  <tr>
     <td>Id Acceso:</td>
     <td><?php echo form_input('idacceso',$acceso['idacceso'],array("disabled"=>"disabled",'placeholder'=>'Idaccesos')) ?></td>
  </tr>
 
 
<tr>
     <td>Usuario:</td>
     <td><?php 
$options= array("NADA");
foreach ($usuarios as $row){
	$options[$row->idusuario]= $row->elusuario;
}

echo form_input('idusuario',$options[$acceso['idusuario']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 

  
<tr>
     <td>Modulo:</td>
     <td><?php 
$options= array("NADA");
foreach ($modulos as $row){
	$options[$row->idmodulo]= $row->nombre;
}

echo form_input('idmodulo',$options[$acceso['idmodulo']],array("disabled"=>"disabled")) ?></td>
  </tr>



<tr>
     <td>Nivel de acceso:</td>
     <td><?php 
$options= array("NADA");
foreach ($nivelaccesos as $row){
	$options[$row->idnivelacceso]= $row->nombre;
}

echo form_input('idnivelacceso',$options[$acceso['idnivelacceso']],array("disabled"=>"disabled")) ?></td>
  </tr>





</table>
<?php echo form_close(); ?>





</body>









</html>
