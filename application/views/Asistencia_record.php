<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('Asistencia/save_edit') ?>
    <ul>
<?php
if(isset($Asistencia))
{
?>
 
        <li> <?php echo anchor('Asistencia/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('Asistencia/anterior/'.$Asistencia['idAsistencia'], 'anterior'); ?></li>
        <li> <?php echo anchor('Asistencia/siguiente/'.$Asistencia['idAsistencia'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('Asistencia/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('Asistencia/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('Asistencia/edit/'.$Asistencia['idAsistencia'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('Asistencia/delete/'.$Asistencia['idAsistencia'],'Delete'); ?></li>
        <li> <?php echo anchor('Asistencia/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('Asistencia/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$Asistencia['idevento']) ?>
<table>

<tr>
     <td>Id Evento:</td>
     <td><?php echo form_input('idevento',$Asistencia['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos')) ?></td>
  </tr>
<tr>
     <td>Evento:</td>
     <td><?php 
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$Asistencia['idevento']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 
  <tr>
     <td>Id Persona:</td>
     <td><?php echo form_input('idpersona',$Asistencia['idpersona'],array("disabled"=>"disabled",'placeholder'=>'IdAsistenciaes')) ?></td>
  </tr>
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->nombres;
}

echo form_input('nombre',$options[$Asistencia['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>

 
  

<tr>
     <td>Certificado:</td>
     <td><?php 
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
if(!isset($Asistencia['iddocumento'])){
echo form_input('nombre',"",array("disabled"=>"disabled")) ;
}else{
echo form_input('nombre',$options[$Asistencia['iddocumento']],array("disabled"=>"disabled"));
}
 ?></td>
  </tr>






</table>
<?php echo form_close(); ?>





</body>









</html>
