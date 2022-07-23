<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($gestion))
{
?>
        <li> <?php echo anchor('gestion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('gestion/siguiente/'.$gestion['idgestion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('gestion/anterior/'.$gestion['idgestion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('gestion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('gestion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('gestion/edit/'.$gestion['idgestion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('gestion/delete/'.$gestion['idgestion'],'Delete'); ?></li>
        <li> <?php echo anchor('gestion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('gestion/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('gestion/save_edit') ?>
<?php echo form_hidden('idgestion',$gestion['idgestion']) ?>
<table>


  <tr>
     <td>idgestion:</td>
     <td><?php echo form_input('idgestion',$gestion['idgestion'],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$gestion['nombre'],array('placeholder'=>'Nombre del gestion')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



