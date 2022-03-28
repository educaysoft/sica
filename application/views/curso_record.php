<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($curso))
{
?>
        <li> <?php echo anchor('curso/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('curso/siguiente/'.$curso['idcurso'], 'siguiente'); ?></li>
        <li> <?php echo anchor('curso/anterior/'.$curso['idcurso'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('curso/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('curso/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('curso/edit/'.$curso['idcurso'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('curso/delete/'.$curso['idcurso'],'Delete'); ?></li>
        <li> <?php echo anchor('curso/listar/','Listar'); ?></li>
        <li> <?php echo anchor('curso/panel/','Panel'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('curso/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('curso/save_edit') ?>
<?php echo form_hidden('idcurso',$curso['idcurso']) ?>
<table>


  <tr>
     <td>idcurso:</td>
     <td><?php echo form_input('idcurso',$curso['idcurso'],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$curso['nombre'],array('placeholder'=>'Nombre del curso')) ?></td>
  </tr>

   
   

</table>
<?php echo form_close(); ?>



