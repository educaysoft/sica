<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($ordenador))
{
?>
        <li> <?php echo anchor('ordenador/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('ordenador/siguiente/'.$ordenador['idordenador'], 'siguiente'); ?></li>
        <li> <?php echo anchor('ordenador/anterior/'.$ordenador['idordenador'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('ordenador/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('ordenador/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('ordenador/edit/'.$ordenador['idordenador'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('ordenador/delete/'.$ordenador['idordenador'],'Delete'); ?></li>
        <li> <?php echo anchor('ordenador/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('ordenador/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('ordenador/save_edit') ?>
<?php echo form_hidden('idordenador',$ordenador['idordenador']) ?>
<table>


  <tr>
     <td>idordenador:</td>
     <td><?php echo form_input('idordenador',$ordenador['idordenador'],array("disabled"=>"disabled",'placeholder'=>'Idordenadors')) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$ordenador['nombre'],array('placeholder'=>'Nombre del ordenador')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



