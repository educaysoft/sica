<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipoasistencia))
{
?>
        <li> <?php echo anchor('tipoasistencia/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipoasistencia/siguiente/'.$tipoasistencia['idtipoasistencia'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipoasistencia/anterior/'.$tipoasistencia['idtipoasistencia'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipoasistencia/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipoasistencia/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipoasistencia/edit/'.$tipoasistencia['idtipoasistencia'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipoasistencia/delete/'.$tipoasistencia['idtipoasistencia'],'Delete'); ?></li>
        <li> <?php echo anchor('tipoasistencia/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipoasistencia/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipoasistencia/save_edit') ?>
<?php echo form_hidden('idtipoasistencia',$tipoasistencia['idtipoasistencia']) ?>
<table>


  <tr>
     <td>idtipoasistencia:</td>
     <td><?php echo form_input('idtipoasistencia',$tipoasistencia['idtipoasistencia'],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$tipoasistencia['nombre'],array('placeholder'=>'Nombre del tipoasistencia')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



