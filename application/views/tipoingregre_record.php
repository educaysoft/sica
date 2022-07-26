<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($tipoingregre))
{
?>
        <li> <?php echo anchor('tipoingregre/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipoingregre/siguiente/'.$tipoingregre['idtipoingregre'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tipoingregre/anterior/'.$tipoingregre['idtipoingregre'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipoingregre/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipoingregre/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipoingregre/edit/'.$tipoingregre['idtipoingregre'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipoingregre/delete/'.$tipoingregre['idtipoingregre'],'Delete'); ?></li>
        <li> <?php echo anchor('tipoingregre/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tipoingregre/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('tipoingregre/save_edit') ?>
<?php echo form_hidden('idtipoingregre',$tipoingregre['idtipoingregre']) ?>
<table>


  <tr>
     <td>idtipoingregre:</td>
     <td><?php echo form_input('idtipoingregre',$tipoingregre['idtipoingregre'],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$tipoingregre['nombre'],array('placeholder'=>'Nombre del tipoingregre')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



