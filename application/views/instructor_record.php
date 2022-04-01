<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($instructor))
{
?>
        <li> <?php echo anchor('instructor/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('instructor/anterior/'.$instructor['idinstructor'], 'anterior'); ?></li>
        <li> <?php echo anchor('instructor/siguiente/'.$instructor['idinstructor'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('instructor/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('instructor/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('instructor/edit/'.$instructor['idinstructor'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('instructor/delete/'.$instructor['idinstructor'],'Delete'); ?></li>
        <li> <?php echo anchor('instructor/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('instructor/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('instructor/save_edit') ?>
<?php echo form_hidden('idinstructor',$instructor['idinstructor']) ?>
<table>
  <tr>
     <td>Id instructor:</td>
     <td><?php echo form_input('idinstructor',$instructor['idinstructor'],array("disabled"=>"disabled",'placeholder'=>'Idinstructors')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$instructor['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Departamento/Carrera:</td>
     <td><?php 
$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}

echo form_input('iddepartamento',$options[$instructor['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
  


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fechadesde',$instructor['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')) ?></td>
  </tr>

<tr>
      <td>Fecha hasta:</td>
      <td><?php echo form_input('fechahasta',$instructor['fechahasta'],array('type'=>'date','placeholder'=>'fechahasta','style'=>'width:500px;')) ?></td>
  </tr>





</table>
<?php echo form_close(); ?>





</body>









</html>
