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
        <li> <?php echo anchor('respuesta/','Respuesta'); ?></li>

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



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Reactivo:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($reactivos as $row){
	$options[$row->idreactivo]= $row->nombre;
}

echo form_input('idreactivo',$options[$pregunta['idreactivo']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div> 
 

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id de la pregunta:</label>
	<div class="col-md-10">
		<?php

     echo form_input('idpregunta',$pregunta['idpregunta'],array("disabled"=>"disabled",'placeholder'=>'Idpreguntas','style'=>'width:500px;')); 
		?>
	</div> 
</div> 
 
 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id de la pregunta:</label>
	<div class="col-md-10">
		<?php
      echo form_input('pregunta',$pregunta['pregunta'],array("disabled"=>"disabled",'placeholder'=>'Pregunta','style'=>'width:500px;')); 
		?>
	</div> 
</div> 







<?php echo form_close(); ?>





</body>









</html>
