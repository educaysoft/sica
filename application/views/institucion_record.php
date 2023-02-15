<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($institucion))
{
?>
        <li> <?php echo anchor('institucion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('institucion/siguiente/'.$institucion['idinstitucion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('institucion/anterior/'.$institucion['idinstitucion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('institucion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('institucion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('institucion/edit/'.$institucion['idinstitucion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('institucion/delete/'.$institucion['idinstitucion'],'Delete'); ?></li>
        <li> <?php echo anchor('institucion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('institucion/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('institucion/save_edit') ?>
<?php echo form_hidden('idinstitucion',$institucion['idinstitucion']) ?>
<table>


  <tr>
     <td>idinstitucion:</td>
     <td><?php echo form_input('idinstitucion',$institucion['idinstitucion'],array("disabled"=>"disabled",'style'=>'width:600px;')) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$institucion['nombre'],array('placeholder'=>'Nombre del institucion',"disabled"=>"disabled",'style'=>'width:600px;')) ?></td>
  </tr>

  <tr>
      <td>Iniciales:</td>
      <td><?php echo form_input('iniciales',$institucion['iniciales'],array('placeholder'=>'Iniciales de la institucion',"disabled"=>"disabled",'style'=>'width:600px;')) ?></td>
  </tr> 
   

</table>
<?php echo form_close(); ?>



