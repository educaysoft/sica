<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($evaluacion))
{
?>
        <li> <?php echo anchor('evaluacion/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('evaluacion/siguiente/'.$evaluacion['idevaluacion'], 'siguiente'); ?></li>
        <li> <?php echo anchor('evaluacion/anterior/'.$evaluacion['idevaluacion'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('evaluacion/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('evaluacion/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('evaluacion/edit/'.$evaluacion['idevaluacion'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('evaluacion/delete/'.$evaluacion['idevaluacion'],'Delete'); ?></li>
        <li> <?php echo anchor('evaluacion/listar/','Listar'); ?></li>
        <li> <?php echo anchor('pregunta/','Pregunas'); ?></li>
        <li> <?php echo anchor('respuesta/','Respuestas'); ?></li>
        <li> <?php echo anchor('evaluacion/imprimir/'.$evaluacion['idevaluacion'],'Imprimir'); ?></li>

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


<div class="form-group row">
    <label class="col-md-2 col-form-label"> id Evaluación:</label>
	<div class="col-md-10">
		<?php
  $eys_arrctl=array("name"=>'idevaluacion','value'=>$evaluacion['idevaluacion'],"disabled"=>"disabled",'placeholder'=>'Idevaluacions','style'=>'width:500px;');
 echo form_input($eys_arrctl) ;
		?>
	</div> 
</div> 




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
		<?php


  $eys_arrctl=array("name"=>'nombre','value'=>$evaluacion['nombre'],"disabled"=>"disabled",'placeholder'=>'Inombre','style'=>'width:500px;');
 echo form_input($eys_arrctl); 

		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
		<?php

  $eys_arrctl=array("name"=>'detalle','value'=>$evaluacion['detalle'],"disabled"=>"disabled",'placeholder'=>'Detalle','style'=>'width:500px;');
 echo form_textarea($eys_arrctl);
		?>
	</div> 
</div> 
  

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id evento:</label>
	<div class="col-md-10">
		<?php

    echo form_input('idevento',$evaluacion['idevento'],array("disabled"=>"disabled",'placeholder'=>'Ideventos')); 

		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Evento </label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}

echo form_input('idevento',$options[$evaluacion['idevento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>


   
   

<?php echo form_close(); ?>





</body>









</html>
