<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('asistencia/save_edit') ?>
    <ul>
<?php
if(isset($asistencia))
{
?>
 
        <li> <?php echo anchor('asistencia/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('asistencia/anterior/'.$asistencia['idasistencia'], 'anterior'); ?></li>
        <li> <?php echo anchor('asistencia/siguiente/'.$asistencia['idasistencia'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('asistencia/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('asistencia/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('asistencia/edit/'.$asistencia['idasistencia'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('asistencia/delete/'.$asistencia['idasistencia'],'Delete'); ?></li>
        <li> <?php echo anchor('asistencia/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('asistencia/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$asistencia['idevento']) ?>
<table>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de asistencia:</label>
	<div class="col-md-10">
		<?php
      		 echo form_input('fecha',$asistencia['fecha'],array('type'=>'date','placeholder'=>'fecha','style'=>'width:500px;')) 
		?>
	</div> 
</div>




<tr>
     <td>Id Evento:</td>
     <td><?php echo form_input('idevento',$asistencia['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos')) ?></td>
  </tr>
<tr>
     <td>Evento:</td>
     <td><?php 
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$asistencia['idevento']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 
  <tr>
     <td>Id Persona:</td>
     <td><?php echo form_input('idpersona',$asistencia['idpersona'],array("disabled"=>"disabled",'placeholder'=>'Idasistenciaes')) ?></td>
  </tr>
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->nombres;
}

echo form_input('nombre',$options[$asistencia['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>

 
  

<tr>
     <td>Tipo de asistencia:</td>
     <td><?php 
$options= array("NADA");
foreach ($tipoasistencias as $row){
	$options[$row->idtipoasistencia]= $row->nombre;
}
if(!isset($asistencia['idtipoasistencia'])){
echo form_input('nombre',"",array("disabled"=>"disabled")) ;
}else{
echo form_input('nombre',$options[$asistencia['idtipoasistencia']],array("disabled"=>"disabled"));
}
 ?></td>
  </tr>






</table>
<?php echo form_close(); ?>





</body>









</html>
