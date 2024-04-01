<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('tipomatricula/save_edit') ?>
    <ul>
        <li> <?php echo anchor('tipomatricula/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipomatricula/anterior/'.$tipomatricula['idtipomatricula'], 'anterior'); ?></li>
        <li> <?php echo anchor('tipomatricula/siguiente/'.$tipomatricula['idtipomatricula'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipomatricula/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipomatricula/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipomatricula/edit/'.$tipomatricula['idtipomatricula'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipomatricula/delete/'.$tipomatricula['idtipomatricula'],'Delete'); ?></li>
        <li> <?php echo anchor('tipomatricula/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idtipomatricula',$tipomatricula['idtipomatricula']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idtipomatricula',$tipomatricula['idtipomatricula'],array("disabled"=>"disabled",'placeholder'=>'Idtipomatriculas')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$tipomatricula['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
