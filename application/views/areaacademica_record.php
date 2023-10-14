<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('areaacademica/save_edit') ?>
    <ul>
        <li> <?php echo anchor('areaacademica/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('areaacademica/anterior/'.$areaacademica['idareaacademica'], 'anterior'); ?></li>
        <li> <?php echo anchor('areaacademica/siguiente/'.$areaacademica['idareaacademica'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('areaacademica/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('areaacademica/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('areaacademica/edit/'.$areaacademica['idareaacademica'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('areaacademica/delete/'.$areaacademica['idareaacademica'],'Delete'); ?></li>
        <li> <?php echo anchor('areaacademica/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idareaacademica',$areaacademica['idareaacademica']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idareaacademica',$areaacademica['idareaacademica'],array("disabled"=>"disabled",'placeholder'=>'Idareaacademicas')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$areaacademica['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
