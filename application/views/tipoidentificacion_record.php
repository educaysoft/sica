<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('tipoidentificacion/save_edit') ?>
    <ul>
        <li> <?php echo anchor('tipoidentificacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipoidentificacion/anterior/'.$tipoidentificacion['idtipoidentificacion'], 'anterior'); ?></li>
        <li> <?php echo anchor('tipoidentificacion/siguiente/'.$tipoidentificacion['idtipoidentificacion'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipoidentificacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipoidentificacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipoidentificacion/edit/'.$tipoidentificacion['idtipoidentificacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipoidentificacion/delete/'.$tipoidentificacion['idtipoidentificacion'],'Delete'); ?></li>
        <li> <?php echo anchor('tipoidentificacion/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idtipoidentificacion',$tipoidentificacion['idtipoidentificacion']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idtipoidentificacion',$tipoidentificacion['idtipoidentificacion'],array("disabled"=>"disabled",'placeholder'=>'Idtipoidentificacions')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$tipoidentificacion['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
