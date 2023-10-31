<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('comisionacademica/save_edit') ?>
    <ul>
        <li> <?php echo anchor('comisionacademica/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('comisionacademica/anterior/'.$comisionacademica['idcomisionacademica'], 'anterior'); ?></li>
        <li> <?php echo anchor('comisionacademica/siguiente/'.$comisionacademica['idcomisionacademica'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('comisionacademica/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('comisionacademica/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('comisionacademica/edit/'.$comisionacademica['idcomisionacademica'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('comisionacademica/delete/'.$comisionacademica['idcomisionacademica'],'Delete'); ?></li>
        <li> <?php echo anchor('comisionacademica/listar/','Listar'); ?></li>

    </ul>
</div>
<br>


<?php echo form_hidden('idcomisionacademica',$comisionacademica['idcomisionacademica']) ?>
<table>


 
 


  <tr>
     <td>Id Tipo Doc:</td>
     <td><?php echo form_input('idcomisionacademica',$comisionacademica['idcomisionacademica'],array("disabled"=>"disabled",'placeholder'=>'Idcomisionacademicas')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Descripción:</td>
     <td><?php echo form_input('nombre',$comisionacademica['nombre'],array("disabled"=>"disabled",'placeholder'=>'nombre')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
