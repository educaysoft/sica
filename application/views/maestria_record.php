<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($maestria))
{
?>
        <li> <?php echo anchor('maestria/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('maestria/siguiente/'.$maestria['idmaestria'], 'siguiente'); ?></li>
        <li> <?php echo anchor('maestria/anterior/'.$maestria['idmaestria'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('maestria/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('maestria/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('maestria/edit/'.$maestria['idmaestria'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('maestria/delete/'.$maestria['idmaestria'],'Delete'); ?></li>
        <li> <?php echo anchor('maestria/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('maestria/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('maestria/save_edit') ?>
<?php echo form_hidden('idmaestria',$maestria['idmaestria']) ?>
<table>


  <tr>
     <td>idmaestria:</td>
     <td><?php echo form_input('idmaestria',$maestria['idmaestria'],array("disabled"=>"disabled",'placeholder'=>'Idmaestrias')) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$maestria['nombre'],array('placeholder'=>'Nombre del maestria')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



