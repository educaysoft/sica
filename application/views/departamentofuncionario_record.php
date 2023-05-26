<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($departamentofuncionario))
{
?>
   <li> <?php echo anchor('departamentofuncionario/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('departamentofuncionario/anterior/'.$departamentofuncionario['iddepartamentofuncionario'], 'anterior'); ?></li>
   <li> <?php echo anchor('departamentofuncionario/siguiente/'.$departamentofuncionario['iddepartamentofuncionario'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('departamentofuncionario/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('departamentofuncionario/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('departamentofuncionario/edit/'.$departamentofuncionario['iddepartamentofuncionario'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('departamentofuncionario/delete/'.$departamentofuncionario['iddepartamentofuncionario'],'Delete'); ?></li>
        <li> <?php echo anchor('departamentofuncionario/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('departamentofuncionario/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('departamentofuncionario/save_edit') ?>
<?php echo form_hidden('iddepartamentofuncionario',$departamentofuncionario['iddepartamentofuncionario']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('iddepartamentofuncionario',$departamentofuncionario['iddepartamentofuncionario'],array("disabled"=>"disabled",'placeholder'=>'Iddepartamentofuncionarios')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($funcionarios as $row){
	$options[$row->idfuncionario]= $row->elfuncionario;
}

echo form_input('idfuncionario',$options[$departamentofuncionario['idfuncionario']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Pais residencia:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($departamentos as $row){
	      $options[$row->iddepartamento]= $row->nombre;
    }
    echo form_input('iddepartamento',$options[$departamentofuncionario['iddepartamento']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fechadesde',$departamentofuncionario['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
