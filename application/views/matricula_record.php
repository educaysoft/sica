<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($matricula))
{
?>
   <li> <?php echo anchor('matricula/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('matricula/anterior/'.$matricula['idmatricula'], 'anterior'); ?></li>
   <li> <?php echo anchor('matricula/siguiente/'.$matricula['idmatricula'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('matricula/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('matricula/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('matricula/edit/'.$matricula['idmatricula'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('matricula/delete/'.$matricula['idmatricula'],'Delete'); ?></li>
        <li> <?php echo anchor('matricula/listar/','Listar'); ?></li>

        <li> <?php echo anchor('matricula/genpagina/'.$matricula['idperiodoacademico'],'generapagina'); ?></li>
<?php 
}else{
?>

        <li> <?php echo anchor('matricula/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('matricula/save_edit') ?>
<?php echo form_hidden('idmatricula',$matricula['idmatricula']) ?>
<table>
  <tr>
     <td>Idmatricula:</td>
     <td><?php echo form_input('idmatricula',$matricula['idmatricula'],array("disabled"=>"disabled",'placeholder'=>'Idmatriculas')) ?></td>
  </tr>
 
 
<tr>
     <td>( <?php echo anchor('estudiante/actual/'.$matricula['idestudiante'], 'Alumno:'); ?>) </td>
     <td><?php 
$options= array("NADA");
foreach ($estudiantes as $row){
	$options[$row->idestudiante]= $row->elestudiante;
}

echo form_input('idestudiante',$options[$matricula['idestudiante']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Departamento:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($departamentos as $row){
	      $options[$row->iddepartamento]= $row->nombre;
    }
    echo form_input('iddepartamento',$options[$matricula['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  

<tr>
     <td>Periodo:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($periodoacademicos as $row){
	      $options[$row->idperiodoacademico]= $row->elperiodoacademico;
    }
    echo form_input('iperiodoacademico',$options[$matricula['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>




<tr>
      <td>Repeticion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($tipomatriculas as $row){
	      $options[$row->idtipomatricula]= $row->nombre;
    }
 

       echo form_input('idtipomatricula',$options[$matricula['idtipomatricula']],array('disable'=>'disable','placeholder'=>'tipomatricula','style'=>'width:500px;')) ?></td>
</tr>



  
<tr>
      <td>Repeticion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($nivelacademicos as $row){
	      $options[$row->idnivelacademico]= $row->nombre;
    }
 

       echo form_input('idnivelacademico',$options[$matricula['idnivelacademico']],array('disable'=>'disable','placeholder'=>'nivelacademico','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
