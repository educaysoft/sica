<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($cliente))
{
?>
   <li> <?php echo anchor('cliente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('cliente/anterior/'.$cliente['idcliente'], 'anterior'); ?></li>
   <li> <?php echo anchor('cliente/siguiente/'.$cliente['idcliente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('cliente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('cliente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('cliente/edit/'.$cliente['idcliente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('cliente/delete/'.$cliente['idcliente'],'Delete'); ?></li>
        <li> <?php echo anchor('cliente/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('cliente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('cliente/save_edit') ?>
<?php echo form_hidden('idcliente',$cliente['idcliente']) ?>
<table>
  <tr>
     <td>Id Correo:</td>
     <td><?php echo form_input('idcliente',$cliente['idcliente'],array("disabled"=>"disabled",'placeholder'=>'Idclientes')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$cliente['idpersona']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
  </tr>
 

 <tr>
     <td>Institucion:</td>
     <td><?php 
    $options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
    echo form_input('idinstitucion',$options[$cliente['idinstitucion']],array("disabled"=>"disabled",'style'=>'width:500px;')) ?></td>
 </tr>
  


  
<tr>
      <td>Fecha de Inscripcion:</td>
      <td><?php echo form_input('fechainscripcion',$cliente['fechainscripcion'],array('type'=>'date','placeholder'=>'fechainscripcion','style'=>'width:500px;')) ?></td>
</tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
