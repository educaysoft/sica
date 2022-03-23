<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipoparticipacion))
{
?>
        <li> <?php echo anchor('tipoparticipacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipoparticipacion/siguiente/'.$tipoparticipacion['idtipoparticipacion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipoparticipacion/anterior/'.$tipoparticipacion['idtipoparticipacion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipoparticipacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipoparticipacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipoparticipacion/edit/'.$tipoparticipacion['idtipoparticipacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipoparticipacion/delete/'.$tipoparticipacion['idtipoparticipacion'],'Delete'); ?></li>
        <li> <?php echo anchor('tipoparticipacion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipoparticipacion/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipoparticipacion/save_edit') ?>
<?php echo form_hidden('idtipoparticipacion',$tipoparticipacion['idtipoparticipacion']) ?>
<table>


  <tr>
     <td>idtipoparticipacion:</td>
     <td><?php echo form_input('idtipoparticipacion',$tipoparticipacion['idtipoparticipacion'],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$tipoparticipacion['nombre'],array('placeholder'=>'Nombre del tipoparticipacion')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



