<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($estudio))
{
?>
   <li> <?php echo anchor('estudio/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('estudio/anterior/'.$estudio['idestudio'], 'anterior'); ?></li>
   <li> <?php echo anchor('estudio/siguiente/'.$estudio['idestudio'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('estudio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('estudio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('estudio/edit/'.$estudio['idestudio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('estudio/delete/'.$estudio['idestudio'],'Delete'); ?></li>
        <li> <?php echo anchor('estudio/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('estudio/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('estudio/save_edit') ?>
<?php echo form_hidden('idestudio',$estudio['idestudio']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('idestudio',$estudio['idestudio'],array("disabled"=>"disabled",'placeholder'=>'Idestudios')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$estudio['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Institucion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
    echo form_input('idinstitucion',$options[$estudio['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Nivel del estudio:</td>
      <td><?php echo form_input('nivel',$estudio['nivel'],array('type'=>'date','placeholder'=>'Niver de estudio','style'=>'width:500px;')) ?></td>
</tr>

<tr>
      <td>Titulo:</td>
      <td><?php echo form_input('titulo',$estudio['titulo'],array('type'=>'date','placeholder'=>'Titulo obtenido','style'=>'width:500px;')) ?></td>
</tr>





</table>
<?php echo form_close(); ?>





</body>









</html>
