<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($departamentoalumno))
{
?>
   <li> <?php echo anchor('departamentoalumno/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('departamentoalumno/anterior/'.$departamentoalumno['iddepartamentoalumno'], 'anterior'); ?></li>
   <li> <?php echo anchor('departamentoalumno/siguiente/'.$departamentoalumno['iddepartamentoalumno'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('departamentoalumno/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('departamentoalumno/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('departamentoalumno/edit/'.$departamentoalumno['iddepartamentoalumno'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('departamentoalumno/delete/'.$departamentoalumno['iddepartamentoalumno'],'Delete'); ?></li>
        <li> <?php echo anchor('departamentoalumno/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('departamentoalumno/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('departamentoalumno/save_edit') ?>
<?php echo form_hidden('iddepartamentoalumno',$departamentoalumno['iddepartamentoalumno']) ?>
<table>
  <tr>
     <td>Id DepartamenteoFuncioanrio:</td>
     <td><?php echo form_input('iddepartamentoalumno',$departamentoalumno['iddepartamentoalumno'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentoalumnos')) ?></td>
  </tr>
 
 
<tr>
     <td>( <?php echo anchor('alumno/actual/'.$departamentoalumno['idalumno'], 'Alumno:'); ?>) </td>
     <td><?php 
$options= array("NADA");
foreach ($alumnos as $row){
	$options[$row->idalumno]= $row->elalumno;
}

echo form_input('idalumno',$options[$departamentoalumno['idalumno']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Departamento:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($departamentos as $row){
	      $options[$row->iddepartamento]= $row->nombre;
    }
    echo form_input('iddepartamento',$options[$departamentoalumno['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  

<tr>
     <td>Cohorte:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($periodoacademicos as $row){
	      $options[$row->idperiodoacademico]= $row->elperiodoacademico;
    }
    echo form_input('iperiodoacademico',$options[$departamentoalumno['idperiodoacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fechadesde',$departamentoalumno['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
