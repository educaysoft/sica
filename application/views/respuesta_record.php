<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($respuesta))
{
?>

        <li> <?php echo anchor('respuesta/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('respuesta/anterior/'.$respuesta['idrespuesta'], 'anterior'); ?></li>
        <li> <?php echo anchor('respuesta/siguiente/'.$respuesta['idrespuesta'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('respuesta/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('respuesta/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('respuesta/edit/'.$respuesta['idrespuesta'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('respuesta/delete/'.$respuesta['idrespuesta'],'Delete'); ?></li>
        <li> <?php echo anchor('respuesta/listar/','Listar'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('respuesta/add', 'Nuevo'); ?></li>
<?php
}
?>




    </ul>
</div>
<br>


<?php echo form_hidden('idrespuesta',$respuesta['idrespuesta']) ?>
<table>

<tr>
     <td>Institucion:</td>
     <td><?php 
$options= array("NADA");
foreach ($preguntas as $row){
	$options[$row->idpregunta]= $row->pregunta;
}

echo form_input('idpregunta',$options[$respuesta['idpregunta']],array("disabled"=>"disabled")) ?></td>
  </tr>
 
 


  <tr>
     <td>Id Pregunta:</td>
     <td><?php echo form_input('idrespuesta',$respuesta['idrespuesta'],array("disabled"=>"disabled",'placeholder'=>'Idrespuestas')) ?></td>
  </tr>
 
 
 
  <tr>
     <td>Nombre:</td>
     <td><?php echo form_input('respuesta',$respuesta['respuesta'],array("disabled"=>"disabled",'placeholder'=>'Pregunta')) ?></td>
  </tr>


  








</table>
<?php echo form_close(); ?>





</body>









</html>
