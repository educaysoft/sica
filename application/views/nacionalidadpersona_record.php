<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($nacionalidadpersona))
{
?>
   <li> <?php echo anchor('nacionalidadpersona/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('nacionalidadpersona/anterior/'.$nacionalidadpersona['idnacionalidadpersona'], 'anterior'); ?></li>
   <li> <?php echo anchor('nacionalidadpersona/siguiente/'.$nacionalidadpersona['idnacionalidadpersona'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('nacionalidadpersona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('nacionalidadpersona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('nacionalidadpersona/edit/'.$nacionalidadpersona['idnacionalidadpersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('nacionalidadpersona/delete/'.$nacionalidadpersona['idnacionalidadpersona'],'Delete'); ?></li>
        <li> <?php echo anchor('nacionalidadpersona/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('nacionalidadpersona/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('nacionalidadpersona/save_edit') ?>
<?php echo form_hidden('idnacionalidadpersona',$nacionalidadpersona['idnacionalidadpersona']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('idnacionalidadpersona',$nacionalidadpersona['idnacionalidadpersona'],array("disabled"=>"disabled",'placeholder'=>'Idnacionalidadpersonas')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$nacionalidadpersona['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Institucion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($nacionalidades as $row){
	      $options[$row->idnacionalidad]= $row->nombre;
    }
    echo form_input('idnacionalidad',$options[$nacionalidadpersona['idnacionalidad']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fechadesde',$fechadesde['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
