<div id="eys-nav-i">
    <h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
    <ul>
<?php
if(isset($asignatura))
{
?>
        <li> <?php echo anchor('asignatura/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('asignatura/siguiente/'.$asignatura['idasignatura'], 'siguiente'); ?></li>
        <li> <?php echo anchor('asignatura/anterior/'.$asignatura['idasignatura'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('asignatura/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('asignatura/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('asignatura/edit/'.$asignatura['idasignatura'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('asignatura/quitar/'.$asignatura['idasignatura'],'Quitar'); ?></li>
        <li> <?php echo anchor('asignatura/listar/','Listar'); ?></li>
	<li> <?php echo anchor('asignatura/reportepdf/'.$asignatura['idmalla'],'reportepdf'); ?></li>
<?php 
}else{
?>

        <li> <?php echo anchor('asignatura/add', 'Nuevo'); ?></li>
<?php
}
?>
    </ul>
</div>
<br>
<br>


<?php echo form_hidden('idasignatura',$asignatura['idasignatura']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id asignatura:</label>
	<div class="col-md-10">
      <?php

  $eys_arrctl=array("name"=>'idasignatura',"id"=>"idasignatura" ,'value'=>$asignatura['idasignatura'],"disabled"=>"disabled",'placeholder'=>'Idasignaturas','style'=>'width:500px;');
 echo form_input($eys_arrctl); 
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Código:</label>
	<div class="col-md-10">
      <?php

  $eys_arrctl=array("name"=>'codigo','value'=>$asignatura['codigo'],"disabled"=>"disabled",'placeholder'=>'Código','style'=>'width:500px;');
 echo form_input($eys_arrctl);
	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nombre:</label>
	<div class="col-md-10">
      <?php
  $eys_arrctl=array("name"=>'nombre','value'=>$asignatura['nombre'],"disabled"=>"disabled",'placeholder'=>'Nombre','style'=>'width:500px;');
 echo form_input($eys_arrctl);
	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Malla: ( <?php echo anchor('malla/actual/'.$asignatura['idmalla'], 'Ver'); ?>):</label>
	<div class="col-md-10">
      <?php
    $options= array("NADA");
    foreach ($mallas as $row){
	      $options[$row->idmalla]= $row->nombrecorto;
    }
    echo form_input('idmalla',$options[$asignatura['idmalla']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
	?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Área conocimiento: ( <?php echo anchor('areaconocimiento/actual/'.$asignatura['idareaconocimiento'], 'Ver'); ?>):</label>
	<div class="col-md-10">
      <?php
    $options= array("NADA");
    foreach ($areaconocimientos as $row){
	      $options[$row->idareaconocimiento]= $row->nombre;
    }
    echo form_input('idareaconocimiento',$options[$asignatura['idareaconocimiento']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
	?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"> Nivel:</label>
	<div class="col-md-10">
      <?php

    $options= array("NADA");
    foreach ($nivelacademicos as $row){
	      $options[$row->idnivelacademico]= $row->nombre;
    }
    echo form_input('idnivelacademico',$options[$asignatura['idnivelacademico']],array("disabled"=>"disabled",'style'=>'width:500px;')); 

	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Créditos:</label>
	<div class="col-md-10">
      <?php

  $eys_arrctl=array("name"=>'creditos','value'=>$asignatura['creditos'],"disabled"=>"disabled",'placeholder'=>'Crédigos','style'=>'width:500px;');
 echo form_input($eys_arrctl);
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Resultados Aprendizaje:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('resultadosaprendizaje',$asignatura['resultadosaprendizaje'],$textarea_options);
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Contenidos mínimos:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('contenidosminimos',$asignatura['contenidosminimos'],$textarea_options);
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('horasasignatura/add/'.$asignatura['idasignatura'], 'Horas:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($horasasignaturas as $row){
		$options[$row->idhorasasignatura]=$row->descripcion." (".$row->cantidad.")";
	}
 echo form_multiselect('horasasignatura[]',$options,(array)set_value('idhorasasignatura', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('referenciasasignatura/add/'.$asignatura['idasignatura'], 'Referencias:'); ?>:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
 	$arrurl = array();
  	foreach ($referenciasasignaturas as $row){
		$options[$row->idreferenciasasignatura]=$row->tipo." (".$row->titulo.")";
		$arrurl[$row->idreferenciasasignatura]=$row->url;
	}
 echo form_multiselect('referenciasasignatura[]',$options,(array)set_value('idreferenciasasignatura', ''), array('style'=>'width:500px','name'=>'idreferenciasasignatura','id'=>'idreferenciasasignatura','onChange'=>'mostrarref()')); 

	?>
	</div> 
</div>




<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Silabos presentados: </b>
        </div>
        
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatas">
	 <thead>
	 <tr>
	 <th>idasignatura</th>
	 <th>idsilabo</th>
	 <th>elsilabo</th>
	 <th>periodo</th>
	 <th>eldocente</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datas">
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
  	<div class="col-12" style="border:solid;" >

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Horarios de la Asignatura </b>
        </div>
        
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idasignatura</th>
	 <th>paralelo</th>
	 <th>dia</th>
	 <th>horainicio</th>
	 <th>duración</th>
	 <th>dist.docente</th>
	 <th>aula</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datas">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>



<?php echo form_close(); ?>$r->elaula,

<script type="text/javascript">

$(document).ready(function(){
	var idasignatura=document.getElementById("idasignatura").value;
	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('asignatura/silabo_data')?>', type: 'GET',data:{idasignatura:idasignatura}},});

	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('asignaturadocente/jornadadocente2_data')?>', type: 'GET',data:{idasignatura:idasignatura}},});

});









$('#show_datas').on('click','.item_ver',function(){
var id= $(this).data('idsilabo');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});

function mostrarref()
{

	var options = document.getElementById('idreferenciasasignatura').selectedOptions;
	  var idreferenciasasignatura = Array.from(options).map(({ value }) => value);
//	  var idreferenciasasignatura= $('select[name=idreferenciasasignatura]').val();
//	  var idreferenciasasignatura=2;
       var refe = JSON.parse('<?= json_encode($arrurl); ?>');
	console.log(refe[idreferenciasasignatura]);
	window.location.href = refe[idreferenciasasignatura];


}



</script>



</body>









</html>
