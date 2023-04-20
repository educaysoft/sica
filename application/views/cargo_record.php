<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($cargo))
{
?>
        <li> <?php echo anchor('cargo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('cargo/siguiente/'.$cargo['idcargo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('cargo/anterior/'.$cargo['idcargo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('cargo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('cargo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('cargo/edit/'.$cargo['idcargo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('cargo/delete/'.$cargo['idcargo'],'Delete'); ?></li>
        <li> <?php echo anchor('cargo/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('cargo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('cargo/save_edit') ?>
<?php echo form_hidden('idcargo',$cargo['idcargo']) ?>
<table>


  <tr>
     <td>idcargo:</td>
     <td><?php echo form_input('idcargo',$cargo['idcargo'],array("disabled"=>"disabled",'placeholder'=>'Idcargos')) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$cargo['nombre'],array('placeholder'=>'Nombre del cargo')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



