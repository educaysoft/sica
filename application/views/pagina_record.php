<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($pagina))
{
?>
        <li> <?php echo anchor('pagina/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('pagina/siguiente/'.$pagina['idpagina'], 'siguiente'); ?></li>
        <li> <?php echo anchor('pagina/anterior/'.$pagina['idpagina'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('pagina/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('pagina/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('pagina/edit/'.$pagina['idpagina'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('pagina/delete/'.$pagina['idpagina'],'Delete'); ?></li>
        <li> <?php echo anchor('pagina/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('pagina/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('pagina/save_edit') ?>
<?php echo form_hidden('idpagina',$pagina['idpagina']) ?>
<table>


  <tr>
     <td>idpagina:</td>
     <td><?php echo form_input('idpagina',$pagina['idpagina'],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$pagina['nombre'],array("disabled"=>"disabled",'placeholder'=>'Nombre del pagina','style'=>'width:500px;')) ?></td>
  </tr>

  <tr>
      <td>Ruta:</td>
      <td><?php echo form_input('ruta',$pagina['ruta'],array("disabled"=>"disabled",'placeholder'=>'Ruta de la pagina','style'=>'width:500px;')) ?></td>
  </tr> 
   

</table>
<?php echo form_close(); ?>



