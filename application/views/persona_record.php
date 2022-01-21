<div id="eys-nav-i">
	<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($persona))
{
?>
        <li> <?php echo anchor('persona/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('persona/siguiente/'.$persona['idpersona'], 'siguiente'); ?></li>
        <li> <?php echo anchor('persona/anterior/'.$persona['idpersona'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('persona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('persona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('persona/edit/'.$persona['idpersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('persona/delete/'.$persona['idpersona'],'Delete'); ?></li>
        <li> <?php echo anchor('persona/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('persona/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('persona/save_edit') ?>
<?php echo form_hidden('idpersona',$persona['idpersona']) ?>


<table>

  <tr>
     <td>Id Persona:</td>
     <td><?php echo form_input('idpersona',$persona['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idpersonas')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Cedula:</td>
     <td><?php echo form_input('cedula',$persona['cedula'],array("disabled"=>"disabled",'placeholder'=>'cedula')) ?></td>
  </tr>

 
  <tr>
     <td>Apellidos:</td>
     <td><?php echo form_input('apellidos',$persona['apellidos'],array("disabled"=>"disabled",'placeholder'=>'apellidos')) ?></td>
  </tr>
  
 
  <tr>
     <td>Nombres:</td>
     <td><?php echo form_input('nombres',$persona['nombres'],array("disabled"=>"disabled",'placeholder'=>'nombres')) ?></td>
  </tr>

<tr>
     <td>Fecha nacimiento:</td>
     <td><?php echo form_input('fechanacimiento',$persona['fechanacimiento'],array("disabled"=>"disabled",'placeholder'=>'Fechanacimiento')) ?></td>
  </tr>


  <tr>
      <td> <?php echo anchor('correo/add', 'Correo:'); ?> </td>
      <td><?php
 	$options = array();
  	foreach ($correos as $row){
		$options[$row->idcorreo]=$row->nombre;
	}


 echo form_multiselect('correo[]',$options,(array)set_value('idcorreo', ''), array('style'=>'width:500px')); ?></td>
  </tr>




<tr>
      <td> <?php echo anchor('telefono/add', 'Teléfono:'); ?> </td>
      <td><?php
 	$options = array();
  	foreach ($telefonos as $row){
		$options[$row->idtelefono]=$row->numero;
	}


 echo form_multiselect('telefono[]',$options,(array)set_value('idtelefono', ''), array('style'=>'width:500px')); ?></td>
  </tr>



  <tr>
     <td>Foto:</td>
     <td><?php echo form_input('foto',$persona['foto'],array("disabled"=>"disabled",'placeholder'=>'foto')) ?></td>
  </tr>




</table>
<?php echo form_close(); ?>





</body>









</html>
