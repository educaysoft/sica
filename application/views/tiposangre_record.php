<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('tiposangre/save_edit') ?>
    <ul>
        <li> <?php echo anchor('tiposangre/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tiposangre/anterior/'.$tiposangre['idtiposangre'], 'anterior'); ?></li>
        <li> <?php echo anchor('tiposangre/siguiente/'.$tiposangre['idtiposangre'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tiposangre/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tiposangre/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tiposangre/edit/'.$tiposangre['idtiposangre'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tiposangre/delete/'.$tiposangre['idtiposangre'],'Delete'); ?></li>
        <li> <?php echo anchor('tiposangre/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idtiposangre',$tiposangre['idtiposangre']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idtiposangre',$tiposangre['idtiposangre'],array("disabled"=>"disabled",'placeholder'=>'Idtiposangres')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$tiposangre['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
