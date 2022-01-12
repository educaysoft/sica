<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($resultado))
{
?>
        <li> <?php echo anchor('resultado/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('resultado/anterior/'.$resultado['idresultado'], 'anterior'); ?></li>
        <li> <?php echo anchor('resultado/siguiente/'.$resultado['idresultado'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('resultado/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('resultado/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('resultado/edit/'.$resultado['idresultado'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('resultado/delete/'.$resultado['idresultado'],'Delete'); ?></li>
        <li> <?php echo anchor('resultado/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('resultado/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('resultado/save_edit') ?>
<?php echo form_hidden('idresultado',$resultado['idresultado']) ?>
<table>
  <tr>
     <td>Id Evaluado:</td>
     <td><?php echo form_input('idresultado',$resultado['idresultado'],array("disabled"=>"disabled",'placeholder'=>'Idresultados')) ?></td>
  </tr>
 
 
<tr>
     <td>Evaluado:</td>
     <td><?php 
$options= array("NADA");
foreach ($evaluados as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('idevaluado',$options[$resultado['idevaluado']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 

  
<tr>
     <td>Pregunta:</td>
     <td><?php 
$options= array("NADA");
foreach ($perguntas as $row){
	$options[$row->idpregunta]= $row->pregunta;
}

echo form_input('idpregunta',$options[$resultado['idpregunta']],array("disabled"=>"disabled")) ?></td>
  </tr>


<tr>
     <td>Respuesta:</td>
     <td><?php 
$options= array("NADA");
foreach ($respuestas as $row){
	$options[$row->idrespuesta]= $row->respuesta;
}

echo form_input('idrespuesta',$options[$resultado['idrespuesta']],array("disabled"=>"disabled")) ?></td>
  </tr>







</table>
<?php echo form_close(); ?>





</body>









</html>
