<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($evaluacion))
{
?>
        <li> <?php echo anchor('evaluacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('evaluacion/siguiente/'.$evaluacion['idevaluacion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('evaluacion/anterior/'.$evaluacion['idevaluacion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('evaluacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('evaluacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('evaluacion/edit/'.$evaluacion['idevaluacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('evaluacion/delete/'.$evaluacion['idevaluacion'],'Delete'); ?></li>
        <li> <?php echo anchor('evaluacion/listar/','Listar'); ?></li>
        <li> <?php echo anchor('evaluacion/imprimir/'.$evaluacion['idevaluacion'],'Imprimir'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('evaluacion/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_open('evaluacion/save_edit') ?>
<?php echo form_hidden('idevaluacion',$evaluacion['idevaluacion']) ?>
<table>

  <tr>
     <td>Id Institucion:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idevaluacion','value'=>$evaluacion['idevaluacion'],"disabled"=>"disabled",'placeholder'=>'Idevaluacions','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>
 
 <tr>
      <td>Nombre:</td>
      <td><?php


  $eys_arrctl=array("name"=>'nombre','value'=>$evaluacion['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  <tr>
      <td>Detalle:</td>
      <td><?php


  $eys_arrctl=array("name"=>'detalle','value'=>$evaluacion['detalle'],"disabled"=>"disabled",'placeholder'=>'Detalle','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

  


   
   

</table>
<?php echo form_close(); ?>





</body>









</html>
