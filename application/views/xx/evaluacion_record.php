<div id="eys-nav-i">
<div style="text-align: left; font-size:large"> <?php echo $title  ?><idem style="font-size:large" id="idevaluacion"><?php echo $evaluacion['idevaluacion']; ?></idem></div>
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




<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Preguntas: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('pregunta/add/'.$evaluacion['idevaluacion']) ?>">Nueva peregunta</a><a class="btn btn-danger" href="<?php echo base_url('pregunta/reportepdf/'.$evaluacion['idevaluacion']) ?>">Reporte</a>
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatap">
	 <thead>
	 <tr>
	 <th>idevaluacion</th>
	 <th>idpregunta</th>
	 <th>pregunta</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>






<div class="form-group row">
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Respuestas: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('respuesta/add/'.$evaluacion['idevaluacion']) ?>">Nueva respuesta</a><a class="btn btn-danger" href="<?php echo base_url('pregunta/reportepdf/'.$evaluacion['idevaluacion']) ?>">Reporte</a>
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatar">
	 <thead>
	 <tr>
	 <th>idpregunta</th>
	 <th>idrespuesta</th>
	 <th>respuesta</th>
	 <th>acieto</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>











<?php echo form_close(); ?>

<script type="text/javascript">

$(document).ready(function(){
	var idevaluacion=document.getElementById("idevaluacion").innerHTML;
	var mytablaf= $('#mydatap').DataTable({"ajax": {url: '<?php echo site_url('evaluacion/evaluacion_pregunta')?>', type: 'GET',data:{idevaluacion:idevaluacion}},});

	var mytablaf= $('#mydatar').DataTable({"ajax": {url: '<?php echo site_url('evaluacion/evaluacion_respuesta')?>', type: 'GET',data:{idevaluacion:idevaluacion}},});



});

$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idsesionevento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});



</script>



</body>









</html>
