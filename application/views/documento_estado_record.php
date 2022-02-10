<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($documento_estado))
{
?>
        <li> <?php echo anchor('documento_estado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documento_estado/siguiente/'.$documento_estado['iddocumento_estado'], 'siguiente'); ?></li>
        <li> <?php echo anchor('documento_estado/anterior/'.$documento_estado['iddocumento_estado'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documento_estado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('documento_estado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('documento_estado/edit/'.$documento_estado['iddocumento_estado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('documento_estado/delete/'.$documento_estado['iddocumento_estado'],'Delete'); ?></li>
        <li> <?php echo anchor('documento_estado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('documento_estado/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('documento_estado/save_edit') ?>
<?php echo form_hidden('iddocumento_estado',$documento_estado['iddocumento_estado']) ?>
<table>


  <tr>
     <td>iddocumento_estado:</td>
     <td><?php echo form_input('iddocumento_estado',$documento_estado['iddocumento_estado'],array("disabled"=>"disabled",'placeholder'=>'Iddocumento_estados')) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$documento_estado['nombre'],array('placeholder'=>'Nombre del documento_estado')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



