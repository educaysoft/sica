<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($telefono))
{
?>
        <li> <?php echo anchor('telefono/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('telefono/anterior/'.$telefono['idtelefono'], 'anterior'); ?></li>
        <li> <?php echo anchor('telefono/siguiente/'.$telefono['idtelefono'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('telefono/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('telefono/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('telefono/edit/'.$telefono['idtelefono'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('telefono/delete/'.$telefono['idtelefono'],'Delete'); ?></li>
        <li> <?php echo anchor('telefono/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('telefono/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('telefono/save_edit') ?>
<?php echo form_hidden('idtelefono',$telefono['idtelefono']) ?>
<table>
  <tr>
     <td>Id telefono:</td>
     <td><?php echo form_input('idtelefono',$telefono['idtelefono'],array("disabled"=>"disabled",'placeholder'=>'Idtelefonos')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$telefono['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 
  <tr>
     <td>Telefono:</td>
     <td><?php echo form_input('numero',$telefono['numero'],array("disabled"=>"disabled",'placeholder'=>'Numero')) ?></td>
  </tr>


  
<tr>
     <td>Operadora:</td>
     <td><?php 
$options= array("NADA");
foreach ($operadoras as $row){
	$options[$row->idoperadora]= $row->nombre;
}

echo form_input('idoperadora',$options[$telefono['idoperadora']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Estado del Telfono:</td>
     <td><?php 
$options= array("NADA");
foreach ($telefono_estados as $row){
	$options[$row->idtelefono_estado]= $row->nombre;
}

echo form_input('idtelefono_estado',$options[$telefono['idtelefono_estado']],array("disabled"=>"disabled")) ?></td>
  </tr>




</table>
<?php echo form_close(); ?>





</body>









</html>
