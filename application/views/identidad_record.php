<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($identidad))
{
?>
   <li> <?php echo anchor('identidad/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('identidad/anterior/'.$identidad['ididentidad'], 'anterior'); ?></li>
   <li> <?php echo anchor('identidad/siguiente/'.$identidad['ididentidad'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('identidad/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('identidad/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('identidad/edit/'.$identidad['ididentidad'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('identidad/delete/'.$identidad['ididentidad'],'Delete'); ?></li>
        <li> <?php echo anchor('identidad/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('identidad/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('identidad/save_edit') ?>
<?php echo form_hidden('ididentidad',$identidad['ididentidad']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('ididentidad',$identidad['ididentidad'],array("disabled"=>"disabled",'placeholder'=>'Ididentidads')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$identidad['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Institucion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
    echo form_input('idinstitucion',$options[$identidad['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Nivel del identidad:</td>
      <td><?php echo form_input('nivel',$identidad['nivel'],array('type'=>'date','placeholder'=>'Niver de identidad','style'=>'width:500px;')) ?></td>
</tr>

<tr>
      <td>Titulo:</td>
      <td><?php echo form_input('titulo',$identidad['titulo'],array('type'=>'date','placeholder'=>'Titulo obtenido','style'=>'width:500px;')) ?></td>
</tr>





</table>
<?php echo form_close(); ?>





</body>









</html>
