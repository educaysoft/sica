<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('tipodocumento/save_edit') ?>
    <ul>
        <li> <?php echo anchor('tipodocumento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipodocumento/anterior/'.$tipodocumento['idtipodocumento'], 'anterior'); ?></li>
        <li> <?php echo anchor('tipodocumento/siguiente/'.$tipodocumento['idtipodocumento'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipodocumento/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipodocumento/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipodocumento/edit/'.$tipodocumento['idtipodocumento'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipodocumento/delete/'.$tipodocumento['idtipodocumento'],'Delete'); ?></li>
        <li> <?php echo anchor('tipodocumento/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idtipodocumento',$tipodocumento['idtipodocumento']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idtipodocumento',$tipodocumento['idtipodocumento'],array("disabled"=>"disabled",'placeholder'=>'Idtipodocumentos')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$tipodocumento['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
