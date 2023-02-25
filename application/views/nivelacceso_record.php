<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($nivelacceso))
{
?>
        <li> <?php echo anchor('nivelacceso/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('nivelacceso/siguiente/'.$nivelacceso['idnivelacceso'], 'siguiente'); ?></li>
        <li> <?php echo anchor('nivelacceso/anterior/'.$nivelacceso['idnivelacceso'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('nivelacceso/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('nivelacceso/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('nivelacceso/edit/'.$nivelacceso['idnivelacceso'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('nivelacceso/delete/'.$nivelacceso['idnivelacceso'],'Delete'); ?></li>
        <li> <?php echo anchor('nivelacceso/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('nivelacceso/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idnivelacceso',$nivelacceso['idnivelacceso']) ?>
<table>

  <tr>
     <td>Id Nivelacceso:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idnivelacceso','value'=>$nivelacceso['idnivelacceso'],"disabled"=>"disabled",'placeholder'=>'Idnivelaccesos','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php


  $eys_arrctl=array("name"=>'nombre','value'=>$nivelacceso['nombre'],"disabled"=>"disabled",'placeholder'=>'nombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  <tr>
      <td>Create:</td>
      <td><?php


  $eys_arrctl=array("name"=>'create','value'=>$nivelacceso['create'],"disabled"=>"disabled",'placeholder'=>'create','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

 

 <tr>
      <td>Read:</td>
      <td><?php


  $eys_arrctl=array("name"=>'read','value'=>$nivelacceso['read'],"disabled"=>"disabled",'placeholder'=>'read','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

 <tr>
      <td>Update:</td>
      <td><?php


  $eys_arrctl=array("name"=>'update','value'=>$nivelacceso['update'],"disabled"=>"disabled",'placeholder'=>'update','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

 <tr>
      <td>Delete:</td>
      <td><?php


  $eys_arrctl=array("name"=>'delete','value'=>$nivelacceso['delete'],"disabled"=>"disabled",'placeholder'=>'delete','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

<tr>
      <td>Navegar:</td>
      <td><?php


  $eys_arrctl=array("name"=>'navegar','value'=>$nivelacceso['navegar'],"disabled"=>"disabled",'placeholder'=>'navegar','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>



  <tr>
      <td>Modulo de inicio:</td>
      <td><?php


  $eys_arrctl=array("name"=>'inicio','value'=>$nivelacceso['inicio'],"disabled"=>"disabled",'placeholder'=>'inicio','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  
   

</table>
<?php echo form_close(); ?>





</body>









</html>
