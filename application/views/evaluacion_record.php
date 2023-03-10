<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($evaluacion))
{
?>
        <li> <?php echo anchor('evaluacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('evaluacion/anterior/'.$evaluacion['idevaluacion'], 'anterior'); ?></li>
        <li> <?php echo anchor('evaluacion/siguiente/'.$evaluacion['idevaluacion'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('evaluacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('evaluacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('evaluacion/edit/'.$evaluacion['idevaluacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('evaluacion/delete/'.$evaluacion['idevaluacion'],'Delete'); ?></li>
        <li> <?php echo anchor('evaluacion/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('evaluacion/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('evaluacion/save_edit') ?>
<?php echo form_hidden('idevaluacion',$evaluacion['idevaluacion']) ?>
<table>
  <tr>
     <td>Id Evaluacion:</td>
     <td><?php echo form_input('idevaluacion',$evaluacion['idevaluacion'],array("disabled"=>"disabled",'placeholder'=>'Idevaluacions')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$evaluacion['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 

<tr>
     <td>Pregunta:</td>
     <td><?php 
$options= array("NADA");
foreach ($preguntas as $row){
	$options[$row->idpregunta]= $row->pregunta;
}

echo form_input('idpregunta',$options[$evaluacion['idpregunta']],array("disabled"=>"disabled")) ?></td>
  </tr>

<tr>
     <td>Respuesta:</td>
     <td><?php 
$options= array("NADA");
foreach ($respuestas as $row){
	$options[$row->idrespuesta]= $row->respuesta;
}

echo form_input('idrespuesta',$options[$evaluacion['idrespuesta']],array("disabled"=>"disabled")) ?></td>
  </tr>


  <tr>
     <td>Acierto:</td>
     <td><?php echo form_input('acierto',$evaluacion['acierto'],array("disabled"=>"disabled",'placeholder'=>'acierto')) ?></td>
  </tr>








</table>
<?php echo form_close(); ?>





</body>









</html>
