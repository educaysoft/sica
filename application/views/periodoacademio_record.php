<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($periodoacademio))
{
?>
        <li> <?php echo anchor('periodoacademio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('periodoacademio/siguiente/'.$periodoacademio['idperiodoacademio'], 'siguiente'); ?></li>
        <li> <?php echo anchor('periodoacademio/anterior/'.$periodoacademio['idperiodoacademio'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('periodoacademio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('periodoacademio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('periodoacademio/edit/'.$periodoacademio['idperiodoacademio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('periodoacademio/delete/'.$periodoacademio['idperiodoacademio'],'Delete'); ?></li>
        <li> <?php echo anchor('periodoacademio/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('periodoacademio/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('periodoacademio/save_edit') ?>
<?php echo form_hidden('idperiodoacademio',$periodoacademio['idperiodoacademio']) ?>
<table>


  <tr>
     <td>idperiodoacademio:</td>
     <td><?php echo form_input('idperiodoacademio',$periodoacademio['idperiodoacademio'],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$periodoacademio['nombre'],array('placeholder'=>'Nombre del periodoacademio')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



