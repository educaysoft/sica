<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('canton/save_edit') ?>
    <ul>
        <li> <?php echo anchor('canton/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('canton/anterior/'.$canton['idcanton'], 'anterior'); ?></li>
        <li> <?php echo anchor('canton/siguiente/'.$canton['idcanton'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('canton/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('canton/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('canton/edit/'.$canton['idcanton'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('canton/delete/'.$canton['idcanton'],'Delete'); ?></li>
        <li> <?php echo anchor('canton/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idcanton',$canton['idcanton']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idcanton',$canton['idcanton'],array("disabled"=>"disabled",'placeholder'=>'Idcantons')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$canton['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
