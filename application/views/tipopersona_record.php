<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('tipopersona/save_edit') ?>
    <ul>
        <li> <?php echo anchor('tipopersona/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tipopersona/anterior/'.$tipopersona['idtipopersona'], 'anterior'); ?></li>
        <li> <?php echo anchor('tipopersona/siguiente/'.$tipopersona['idtipopersona'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tipopersona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tipopersona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tipopersona/edit/'.$tipopersona['idtipopersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tipopersona/delete/'.$tipopersona['idtipopersona'],'Delete'); ?></li>
        <li> <?php echo anchor('tipopersona/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idtipopersona',$tipopersona['idtipopersona']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idtipopersona',$tipopersona['idtipopersona'],array("disabled"=>"disabled",'placeholder'=>'Idtipopersonas')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$tipopersona['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
