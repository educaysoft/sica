<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($paispersona))
{
?>
   <li> <?php echo anchor('paispersona/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('paispersona/anterior/'.$paispersona['idpaispersona'], 'anterior'); ?></li>
   <li> <?php echo anchor('paispersona/siguiente/'.$paispersona['idpaispersona'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('paispersona/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('paispersona/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('paispersona/edit/'.$paispersona['idpaispersona'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('paispersona/delete/'.$paispersona['idpaispersona'],'Delete'); ?></li>
        <li> <?php echo anchor('paispersona/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('paispersona/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('paispersona/save_edit') ?>
<?php echo form_hidden('idpaispersona',$paispersona['idpaispersona']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('idpaispersona',$paispersona['idpaispersona'],array("disabled"=>"disabled",'placeholder'=>'Idpaispersonas')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$paispersona['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Institucion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($nacionalidades as $row){
	      $options[$row->idnacionalidad]= $row->nombre;
    }
    echo form_input('idnacionalidad',$options[$paispersona['idnacionalidad']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Fecha desde:</td>
      <td><?php echo form_input('fechadesde',$paispersona['fechadesde'],array('type'=>'date','placeholder'=>'fechadesde','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
