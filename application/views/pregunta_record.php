<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($pregunta))
{
?>

        <li> <?php echo anchor('pregunta/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('pregunta/anterior/'.$pregunta['idpregunta'], 'anterior'); ?></li>
        <li> <?php echo anchor('pregunta/siguiente/'.$pregunta['idpregunta'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('pregunta/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('pregunta/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('pregunta/edit/'.$pregunta['idpregunta'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('pregunta/delete/'.$pregunta['idpregunta'],'Delete'); ?></li>
        <li> <?php echo anchor('pregunta/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('pregunta/add', 'Nuevo'); ?></li>
<?php
}
?>




    </ul>
</div>
<br>


<?php echo form_hidden('idpregunta',$pregunta['idpregunta']) ?>
<table>

<tr>
     <td>Institucion:</td>
     <td><?php 
$options= array("NADA");
foreach ($evaluaciones as $row){
	$options[$row->idevaluacion]= $row->nombre;
}

echo form_input('idevaluacion',$options[$pregunta['idevaluacion']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 


  <tr>
     <td>Id Pregunta:</td>
     <td><?php echo form_input('idpregunta',$pregunta['idpregunta'],array("disabled"=>"disabled",'placeholder'=>'Idpreguntas')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Nombre:</td>
     <td><?php echo form_input('pregunta',$pregunta['pregunta'],array("disabled"=>"disabled",'placeholder'=>'Pregunta')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
