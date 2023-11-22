<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estapamovilidadalumno))
{
?>
   <li> <?php echo anchor('estapamovilidadalumno/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('estapamovilidadalumno/anterior/'.$estapamovilidadalumno['idestapamovilidadalumno'], 'anterior'); ?></li>
   <li> <?php echo anchor('estapamovilidadalumno/siguiente/'.$estapamovilidadalumno['idestapamovilidadalumno'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('estapamovilidadalumno/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estapamovilidadalumno/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estapamovilidadalumno/edit/'.$estapamovilidadalumno['idestapamovilidadalumno'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estapamovilidadalumno/delete/'.$estapamovilidadalumno['idestapamovilidadalumno'],'Delete'); ?></li>
        <li> <?php echo anchor('estapamovilidadalumno/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estapamovilidadalumno/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('estapamovilidadalumno/save_edit') ?>
<?php echo form_hidden('idestapamovilidadalumno',$estapamovilidadalumno['idestapamovilidadalumno']) ?>
<table>
  <tr>
     <td>Id DepartamenteoFuncioanrio:</td>
     <td><?php echo form_input('idestapamovilidadalumno',$estapamovilidadalumno['idestapamovilidadalumno'],array("disabled"=>"disabled",'placeholder'=>'Idestapamovilidadalumnos')) ?></td>
  </tr>
 
 
<tr>
     <td>Funcionario:</td>
     <td><?php 
$options= array("NADA");
foreach ($alumnos as $row){
	$options[$row->idalumno]= $row->elalumno;
}

echo form_input('idalumno',$options[$estapamovilidadalumno['idalumno']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Departamento:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($departamentos as $row){
	      $options[$row->iddepartamento]= $row->nombre;
    }
    echo form_input('iddepartamento',$options[$estapamovilidadalumno['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fechadesde',$estapamovilidadalumno['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
