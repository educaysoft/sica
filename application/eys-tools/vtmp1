<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($evaluado))
{
?>
        <li> <?php echo anchor('evaluado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('evaluado/anterior/'.$evaluado['idevaluado'], 'anterior'); ?></li>
        <li> <?php echo anchor('evaluado/siguiente/'.$evaluado['idevaluado'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('evaluado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('evaluado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('evaluado/edit/'.$evaluado['idevaluado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('evaluado/delete/'.$evaluado['idevaluado'],'Delete'); ?></li>
        <li> <?php echo anchor('evaluado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('evaluado/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('evaluado/save_edit') ?>
<?php echo form_hidden('idevaluado',$evaluado['idevaluado']) ?>
<table>
  <tr>
     <td>Id Evaluado:</td>
     <td><?php echo form_input('idevaluado',$evaluado['idevaluado'],array("disabled"=>"disabled",'placeholder'=>'Idevaluados')) ?></td>
  </tr>
 
 
<tr>
     <td>Persona:</td>
     <td><?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idpersona',$options[$evaluado['idpersona']],array("disabled"=>"disabled")) ?></td>
  </tr>
 

<tr>
     <td>Pregunta:</td>
     <td><?php 
$options= array("NADA");
foreach ($preguntas as $row){
	$options[$row->idpregunta]= $row->pregunta;
}

echo form_input('idpregunta',$options[$evaluado['idpregunta']],array("disabled"=>"disabled")) ?></td>
  </tr>

<tr>
     <td>Respuesta:</td>
     <td><?php 
$options= array("NADA");
foreach ($respuestas as $row){
	$options[$row->idrespuesta]= $row->respuesta;
}

echo form_input('idrespuesta',$options[$evaluado['idrespuesta']],array("disabled"=>"disabled")) ?></td>
  </tr>


  <tr>
     <td>Acierto:</td>
     <td><?php echo form_input('acierto',$evaluado['acierto'],array("disabled"=>"disabled",'placeholder'=>'acierto')) ?></td>
  </tr>








</table>
<?php echo form_close(); ?>





</body>









</html>
