<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estadorequerimiento))
{
?>
        <li> <?php echo anchor('estadorequerimiento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estadorequerimiento/siguiente/'.$estadorequerimiento['idestadorequerimiento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('estadorequerimiento/anterior/'.$estadorequerimiento['idestadorequerimiento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estadorequerimiento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estadorequerimiento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estadorequerimiento/edit/'.$estadorequerimiento['idestadorequerimiento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estadorequerimiento/delete/'.$estadorequerimiento['idestadorequerimiento'],'Delete'); ?></li>
        <li> <?php echo anchor('estadorequerimiento/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estadorequerimiento/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('estadorequerimiento/save_edit') ?>
<?php echo form_hidden('idestadorequerimiento',$estadorequerimiento['idestadorequerimiento']) ?>
<table>


  <tr>
     <td>idestadorequerimiento:</td>
     <td><?php echo form_input('idestadorequerimiento',$estadorequerimiento['idestadorequerimiento'],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$estadorequerimiento['nombre'],array('placeholder'=>'Nombre del estadorequerimiento')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



