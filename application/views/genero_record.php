<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('genero/save_edit') ?>
    <ul>
        <li> <?php echo anchor('genero/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('genero/anterior/'.$genero['idgenero'], 'anterior'); ?></li>
        <li> <?php echo anchor('genero/siguiente/'.$genero['idgenero'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('genero/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('genero/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('genero/edit/'.$genero['idgenero'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('genero/delete/'.$genero['idgenero'],'Delete'); ?></li>
        <li> <?php echo anchor('genero/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idgenero',$genero['idgenero']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idgenero',$genero['idgenero'],array("disabled"=>"disabled",'placeholder'=>'Idgeneros')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$genero['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
