<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('nacionalidad/save_edit') ?>
    <ul>
        <li> <?php echo anchor('nacionalidad/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('nacionalidad/anterior/'.$nacionalidad['idnacionalidad'], 'anterior'); ?></li>
        <li> <?php echo anchor('nacionalidad/siguiente/'.$nacionalidad['idnacionalidad'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('nacionalidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('nacionalidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('nacionalidad/edit/'.$nacionalidad['idnacionalidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('nacionalidad/delete/'.$nacionalidad['idnacionalidad'],'Delete'); ?></li>
        <li> <?php echo anchor('nacionalidad/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idnacionalidad',$nacionalidad['idnacionalidad']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idnacionalidad',$nacionalidad['idnacionalidad'],array("disabled"=>"disabled",'placeholder'=>'Idnacionalidads')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$nacionalidad['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
