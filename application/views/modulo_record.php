<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($modulo))
{
?>
        <li> <?php echo anchor('modulo/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('modulo/siguiente/'.$modulo['idmodulo'], 'siguiente'); ?></li>
        <li> <?php echo anchor('modulo/anterior/'.$modulo['idmodulo'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('modulo/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('modulo/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('modulo/edit/'.$modulo['idmodulo'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('modulo/delete/'.$modulo['idmodulo'],'Delete'); ?></li>
        <li> <?php echo anchor('modulo/listar/','Listar'); ?></li>
		<li> <?php echo anchor('modulo/generapaginaweb/'.$modulo['idmodulo'],'generaweb'); ?></li>
		<li> <?php echo anchor('modulo/paginaweb/'.$modulo['idmodulo'],' web'); ?></li>
<?php 
}else{
?>

        <li> <?php echo anchor('modulo/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idmodulo',$modulo['idmodulo']) ?>
<table>

  <tr>
     <td>Id :</td>
     <td><?php

  $eys_arrctl=array("name"=>'idmodulo','value'=>$modulo['idmodulo'],"disabled"=>"disabled",'placeholder'=>'Idmodulos','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php

  $eys_arrctl=array("name"=>'nombre','value'=>$modulo['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

<tr>
      <td>Modulo:</td>
      <td><?php

  $eys_arrctl=array("name"=>'modulo','value'=>$modulo['modulo'],"disabled"=>"disabled",'placeholder'=>'Imodulo','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>


<tr>
      <td>Funcion:</td>
      <td><?php

  $eys_arrctl=array("name"=>'funcion','value'=>$modulo['funcion'],"disabled"=>"disabled",'placeholder'=>'Ifuncion','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>



 <tr>
      <td>Inicial:</td>
      <td><?php

  $eys_arrctl=array("name"=>'inicial','value'=>$modulo['inicial'],"disabled"=>"disabled",'placeholder'=>'Inicial','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>


<tr>
      <td>Descripcion:</td>
      <td><?php


$textarea_options = array('class' => 'form-control','rows' => '4','disabled'=>'disabled',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
 echo form_textarea('descripcion',$modulo['descripcion'],$textarea_options); 
		?>


  </tr>
   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
