<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($identificacion))
{
?>
   <li> <?php echo anchor('identificacion/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('identificacion/anterior/'.$identificacion['ididentificacion'], 'anterior'); ?></li>
   <li> <?php echo anchor('identificacion/siguiente/'.$identificacion['ididentificacion'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('identificacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('identificacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('identificacion/edit/'.$identificacion['ididentificacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('identificacion/delete/'.$identificacion['ididentificacion'],'Delete'); ?></li>
        <li> <?php echo anchor('identificacion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('identificacion/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('identificacion/save_edit') ?>
<?php echo form_hidden('ididentificacion',$identificacion['ididentificacion']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('ididentificacion',$identificacion['ididentificacion'],array("disabled"=>"disabled",'placeholder'=>'Ididentificacions')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$identificacion['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Institucion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($tipodocumentos as $row){
	      $options[$row->idtipodocumento]= $row->nombre;
    }
    echo form_input('idtipodocumento',$options[$identificacion['idtipodocumento']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>No. identificacion:</td>
      <td><?php echo form_input('identificacion',$identificacion['identificacion'],array('type'=>'date','placeholder'=>'Niver de identificacion','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
