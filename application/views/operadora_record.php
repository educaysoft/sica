<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($operadora))
{
?>
        <li> <?php echo anchor('operadora/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('operadora/siguiente/'.$operadora['idoperadora'], 'siguiente'); ?></li>
        <li> <?php echo anchor('operadora/anterior/'.$operadora['idoperadora'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('operadora/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('operadora/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('operadora/edit/'.$operadora['idoperadora'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('operadora/delete/'.$operadora['idoperadora'],'Delete'); ?></li>
        <li> <?php echo anchor('operadora/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('operadora/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idoperadora',$operadora['idoperadora']) ?>
<table>

  <tr>
     <td>Id Operadora:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idoperadora','value'=>$operadora['idoperadora'],"disabled"=>"disabled",'placeholder'=>'Idoperadoras','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php


  $eys_arrctl=array("name"=>'nombre','value'=>$operadora['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
