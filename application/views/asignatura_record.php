<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($asignatura))
{
?>
        <li> <?php echo anchor('asignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('asignatura/siguiente/'.$asignatura['idasignatura'], 'siguiente'); ?></li>
        <li> <?php echo anchor('asignatura/anterior/'.$asignatura['idasignatura'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('asignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('asignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('asignatura/edit/'.$asignatura['idasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('asignatura/delete/'.$asignatura['idasignatura'],'Delete'); ?></li>
        <li> <?php echo anchor('asignatura/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('asignatura/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idasignatura',$asignatura['idasignatura']) ?>
<table>

  <tr>
     <td>Id artículo:</td>
     <td><?php

  $eys_arrctl=array("name"=>'idasignatura','value'=>$asignatura['idasignatura'],"disabled"=>"disabled",'placeholder'=>'Idasignaturas','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>

<tr>
      <td>Código:</td>
      <td><?php

  $eys_arrctl=array("name"=>'codigo','value'=>$asignatura['codigo'],"disabled"=>"disabled",'placeholder'=>'Código','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>



 <tr>
      <td>Nombre:</td>
      <td><?php

  $eys_arrctl=array("name"=>'nombre','value'=>$asignatura['nombre'],"disabled"=>"disabled",'placeholder'=>'Nombre','style'=>'width:500px;');
 echo form_input($eys_arrctl) ?></td>
  </tr>




   <tr>
     <td>Malla:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($mallas as $row){
	      $options[$row->idmalla]= $row->nombrecorto;
    }
    echo form_input('idmalla',$options[$asignatura['idmalla']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>



<tr>
     <td>Nivel:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($nivelacademicos as $row){
	      $options[$row->idnivelacademico]= $row->nombre;
    }
    echo form_input('idnivelacademico',$options[$asignatura['idnivelacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>


</table>
<?php echo form_close(); ?>





</body>









</html>
