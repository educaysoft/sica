<html>


<body>

<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
        <li> <?php echo anchor('directorio/primero/', 'primero'); ?></li>
        <li> <?php echo anchor('directorio/anterior/'.$directorio['iddirectorio'], 'anterior'); ?></li>
        <li> <?php echo anchor('directorio/siguiente/'.$directorio['iddirectorio'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('directorio/ultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('directorio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('directorio/edit/'.$directorio['iddirectorio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('directorio/delete/'.$directorio['iddirectorio'],'Delete'); ?></li>
        <li> <?php echo anchor('directorio/listar/','Listar'); ?></li>
    </ul>
</div>
<br>
<br>


<?php echo form_open('directorio/save_edit') ?>
<?php echo form_hidden('iddirectorio',$directorio['iddirectorio']) ?>
<table>

  
 


  <tr>
     <td>Id:</td>
     <td><?php echo form_input('iddirectorio',$directorio['iddirectorio'],array("disabled"=>"disabled",'placeholder'=>'Iddirectorios')) ?></td>
  </tr>
 
 <tr>
      <td>Nombres:</td>
      <td><?php echo form_input('nombre',$directorio['nombre'],array('placeholder'=>'Nombre del directorio')) ?></td>
  </tr>

  <tr>
      <td>Ruta:</td>
      <td><?php echo form_input('ruta',$directorio['ruta'],array('placeholder'=>'Ruta del directorio')) ?></td>
  </tr>
  <tr>
      <td>Descripción:</td>
      <td><?php echo form_textarea('descripcion',$directorio['descripcion'],array('placeholder'=>'Ruta del directorio')) ?></td>
  </tr>


 


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
