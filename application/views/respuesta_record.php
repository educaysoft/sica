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



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Pregunta:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($preguntas as $row){
	$options[$row->idpregunta]= $row->pregunta;
}

echo form_input('idpregunta',$options[$respuesta['idpregunta']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div> 
 

<div class="form-group row">
    <label class="col-md-2 col-form-label">Id respuesta:</label>
	<div class="col-md-10">
     <?php 
    echo form_input('idrespuesta',$respuesta['idrespuesta'],array("disabled"=>"disabled",'placeholder'=>'Idrespuestas','style'=>'width:500px;')); 
		?>
	</div> 
</div> 
 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label">Id respuesta:</label>
	<div class="col-md-10">
     <?php 
     echo form_input('respuesta',$respuesta['respuesta'],array("disabled"=>"disabled",'placeholder'=>'Pregunta','style'=>'width:500px;')); 

		?>
	</div> 
</div> 
 

  

<?php echo form_close(); ?>





</body>









</html>
