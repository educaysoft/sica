<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($estado_portafolio))
{
?>
        <li> <?php echo anchor('estado_portafolio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('estado_portafolio/siguiente/'.$estado_portafolio['idestado_portafolio'], 'siguiente'); ?></li>
        <li> <?php echo anchor('estado_portafolio/anterior/'.$estado_portafolio['idestado_portafolio'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('estado_portafolio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estado_portafolio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estado_portafolio/edit/'.$estado_portafolio['idestado_portafolio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estado_portafolio/delete/'.$estado_portafolio['idestado_portafolio'],'Delete'); ?></li>
        <li> <?php echo anchor('estado_portafolio/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estado_portafolio/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idestado_portafolio',$estado_portafolio['idestado_portafolio']) ?>
<table>

  <tr>
     <td>Id Estado_portafolio:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idestado_portafolio','value'=>$estado_portafolio['idestado_portafolio'],"disabled"=>"disabled",'placeholder'=>'Idestado_portafolios','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php


  $eys_arrctl=array("name"=>'nombre','value'=>$estado_portafolio['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
