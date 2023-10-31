<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($tiporelacionpersona))
{
?>
        <li> <?php echo anchor('tiporelacionpersona/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('tiporelacionpersona/siguiente/'.$tiporelacionpersona['idtiporelacionpersona'], 'siguiente'); ?></li>
        <li> <?php echo anchor('tiporelacionpersona/anterior/'.$tiporelacionpersona['idtiporelacionpersona'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('tiporelacionpersona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('tiporelacionpersona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('tiporelacionpersona/edit/'.$tiporelacionpersona['idtiporelacionpersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('tiporelacionpersona/delete/'.$tiporelacionpersona['idtiporelacionpersona'],'Delete'); ?></li>
        <li> <?php echo anchor('tiporelacionpersona/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('tiporelacionpersona/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idtiporelacionpersona',$tiporelacionpersona['idtiporelacionpersona']) ?>
<table>

  <tr>
     <td>Id Tiporelacionpersona:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idtiporelacionpersona','value'=>$tiporelacionpersona['idtiporelacionpersona'],"disabled"=>"disabled",'placeholder'=>'Idtiporelacionpersonas','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php


  $eys_arrctl=array("name"=>'nombre','value'=>$tiporelacionpersona['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
