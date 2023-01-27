<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('sexo/save_edit') ?>
    <ul>
        <li> <?php echo anchor('sexo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('sexo/anterior/'.$sexo['idsexo'], 'anterior'); ?></li>
        <li> <?php echo anchor('sexo/siguiente/'.$sexo['idsexo'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('sexo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('sexo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('sexo/edit/'.$sexo['idsexo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('sexo/delete/'.$sexo['idsexo'],'Delete'); ?></li>
        <li> <?php echo anchor('sexo/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idsexo',$sexo['idsexo']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idsexo',$sexo['idsexo'],array("disabled"=>"disabled",'placeholder'=>'Idsexos')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$sexo['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
