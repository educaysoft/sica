<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tiposeguimiento))
{
?>
        <li> <?php echo anchor('tiposeguimiento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tiposeguimiento/siguiente/'.$tiposeguimiento['idtiposeguimiento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tiposeguimiento/anterior/'.$tiposeguimiento['idtiposeguimiento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tiposeguimiento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tiposeguimiento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tiposeguimiento/edit/'.$tiposeguimiento['idtiposeguimiento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tiposeguimiento/delete/'.$tiposeguimiento['idtiposeguimiento'],'Delete'); ?></li>
        <li> <?php echo anchor('tiposeguimiento/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tiposeguimiento/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tiposeguimiento/save_edit') ?>
<?php echo form_hidden('idtiposeguimiento',$tiposeguimiento['idtiposeguimiento']) ?>
<table>


  <tr>
     <td>idtiposeguimiento:</td>
     <td><?php echo form_input('idtiposeguimiento',$tiposeguimiento['idtiposeguimiento'],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$tiposeguimiento['nombre'],array('placeholder'=>'Nombre del tiposeguimiento')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



