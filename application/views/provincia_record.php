<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('provincia/save_edit') ?>
    <ul>
        <li> <?php echo anchor('provincia/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('provincia/anterior/'.$provincia['idprovincia'], 'anterior'); ?></li>
        <li> <?php echo anchor('provincia/siguiente/'.$provincia['idprovincia'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('provincia/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('provincia/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('provincia/edit/'.$provincia['idprovincia'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('provincia/delete/'.$provincia['idprovincia'],'Delete'); ?></li>
        <li> <?php echo anchor('provincia/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idprovincia',$provincia['idprovincia']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idprovincia',$provincia['idprovincia'],array("disabled"=>"disabled",'placeholder'=>'Idprovincias')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$provincia['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
