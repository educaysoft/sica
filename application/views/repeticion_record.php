<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('repeticion/save_edit') ?>
    <ul>
        <li> <?php echo anchor('repeticion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('repeticion/anterior/'.$repeticion['idrepeticion'], 'anterior'); ?></li>
        <li> <?php echo anchor('repeticion/siguiente/'.$repeticion['idrepeticion'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('repeticion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('repeticion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('repeticion/edit/'.$repeticion['idrepeticion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('repeticion/delete/'.$repeticion['idrepeticion'],'Delete'); ?></li>
        <li> <?php echo anchor('repeticion/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idrepeticion',$repeticion['idrepeticion']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idrepeticion',$repeticion['idrepeticion'],array("disabled"=>"disabled",'placeholder'=>'Idrepeticions')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$repeticion['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
