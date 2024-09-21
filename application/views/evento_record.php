<style>
.modal.face .modal-dialog{
	transform: translate3d(0,200vh,0);
}

.modal.in .modal-dialog{
	transform: translate3d(0,0,0);
}

</style>



<div id="eys-nav-i">
	<div style="text-align: left; font-size:large"> <?php echo $title  ?></div>
	

<?php
if(isset($evento))
{

	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if("evento"==$row["modulo"]["nombre"]);
			{
				$numero=$j;
				$permitir=1;
			}		
			$j=$j+1;
	    	} 
	}
	if($permitir==0){
		redirect('login/logout');
	}

?>


<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['navegar']){ ?>
<ul>
	<li> <?php echo anchor('evento/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('evento/siguiente/'.$evento['idevento'], 'siguiente'); ?></li>
        <li> <?php echo anchor('evento/anterior/'.$evento['idevento'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('evento/elultimo/', 'Último'); ?></li>

	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['create']){ ?>
        <li> <?php echo anchor('evento/add', 'Nuevo'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['update']){ ?>
        <li> <?php echo anchor('evento/edit/'.$evento['idevento'],'Edit'); ?></li>
	<?php } ?>

	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['delete']){ ?>
        <li style="border-right:1px solid green"> <?php echo anchor('evento/quitar/'.$evento['idevento'],'Quitar'); ?></li>
	<?php } ?>

	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['read']){ ?>
        <li> <?php echo anchor('evento/listar/','Eventos'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['read']){ ?>
        <li style="border-right:1px solid green"> <?php echo anchor('evento/detalle/'.$evento['idevento'],'Detalles'); ?></li>
	<?php } ?>

        <li> <?php echo anchor('evento/listar_participantes/'.$evento['idevento'],'Certificados'); ?></li>
        <li> <?php echo anchor('asistencia/add/'.$evento['idevento'],'Asistencias'); ?></li>
        <li> <?php echo anchor('participacion/add/'.$evento['idevento'],'Participacion'); ?></li>
        <li> <?php echo anchor('seguimiento/add/'.$evento['idevento'],'Seguimiento'); ?></li>
        <li> <?php echo anchor('pagoevento/add/'.$evento['idevento'],'Pagos'); ?></li>
        <li> <?php echo anchor('evento/genpagina/'.$evento['idevento'],'genpaginaparti'); ?></li>
        <li> <?php echo anchor('evento/participantes/'.$evento['idevento'],'verparticipante'); ?></li>

	<?php } ?>
<?php 
}else{
?>

        <li> <?php echo anchor('evento_estado/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>


<?php echo form_open('evento/save_edit') ?>
<?php echo form_hidden('idevento',$evento['idevento'],array('name'=>'idevento')) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('institucion/add', 'Institución:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($instituciones as $row){
	      $options[$row->idinstitucion]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idinstitucion','value'=>$options[$evento['idinstitucion']],"disabled"=>"disabled", "style"=>"width:600px");
echo form_input($arrdatos) ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Título del evento:</label>
	<div class="col-md-10">
     <?php echo form_input('titulo',$evento['titulo'],array("disabled"=>"disabled",'placeholder'=>'titulo','style'=>'width:600px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('detalle',$evento['detalle'],$textarea_options);
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipoevento/add', 'Tipo evento:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($tipoeventos as $row){
	      $options[$row->idtipoevento]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idtipoevento','value'=>$options[$evento['idtipoevento']],"disabled"=>"disabled", "style"=>"width:600px");
echo form_input($arrdatos) ?>

	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('evento_estado/add', 'Evento estado:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($evento_estados as $row){
	      $options[$row->idevento_estado]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idevento_estado','value'=>$options[$evento['idevento_estado']],"disabled"=>"disabled", "style"=>"width:600px");
echo form_input($arrdatos) ?>

	</div> 
</div>





 









<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio:</label>
	<div class="col-md-10">
      <?php echo form_input('fechainicia',$evento['fechainicia'],array('type'=>'date', "disabled"=>"disabled",'placeholder'=>'fechainicia','style'=>'width:600px;')) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de finaliza:</label>
	<div class="col-md-10">
      <?php echo form_input('fechafinaliza',$evento['fechafinaliza'],array('type'=>'date', "disabled"=>"disabled",'placeholder'=>'fechafinaliza','style'=>'width:600px;')) ?>
	</div> 
</div>


<!---



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('certificado/add', 'Certificado modelo:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($certificados as $row){
		$options[$row->idcertificado]=$row->asunto;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idcertificado[]',$options,(array)set_value('idcertificado', ''), array('onChange="ver_certicado()"', 'style'=>'width:600px')); 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Pagina: </label>
 

     <?php 
    $options= array("NADA");
    foreach ($paginas as $row){
	      $options[$row->idpagina]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idpagina','value'=>$options[$evento['idpagina']],"disabled"=>"disabled", "style"=>"width:600px");
echo form_input($arrdatos) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración:</label>
	<div class="col-md-10">
     <?php echo form_input('duracion',$evento['duracion'],array("disabled"=>"disabled",'placeholder'=>'duracion','style'=>'width:600px;')) 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Costo:</label>
	<div class="col-md-10">
     <?php echo form_input('costo',$evento['costo'],array("disabled"=>"disabled",'placeholder'=>'costo','style'=>'width:600px;')) 
		?>
	</div> 
</div>


--->

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('calendarioacademico/actual/'.$evento['idcalendarioacademico'], 'Calendario académico:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($calendarioacademicos as $row){
	      $options[$row->idcalendarioacademico]=$row->nombre; 
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idcalendarioacademico','value'=>$options[$evento['idcalendarioacademico']],"disabled"=>"disabled", "style"=>"width:600px");
echo form_input($arrdatos) ?>
	</div> 
</div>








<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>asignaturadocente/actual/<?php echo $evento['idasignaturadocente']; ?> "   >Asinat_Docente: &#x1F448;</a>  </label>
     <?php 
    $options= array("NADA");
    foreach ($asignaturadocentes as $row){
	      $options[$row->idasignaturadocente]=$row->eldistributivodocente."-".$row->laasignatura."-".$row->paralelo; 
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idasignaturadocente','value'=>$options[$evento['idasignaturadocente']],"disabled"=>"disabled", "style"=>"width:600px");
echo form_input($arrdatos) ?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>silabo/actual/<?php echo $evento['idsilabo']; ?> "   >Silabo: &#x1F448;</a>    </label>
     <?php 
    $options= array("NADA");
    foreach ($silabos as $row){
	      $options[$row->idsilabo]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idsilabo','value'=>$options[$evento['idsilabo']],"disabled"=>"disabled", "style"=>"width:600px");
echo form_input($arrdatos) ?>
	</div> 
</div>








<div class="form-group row">
    <label class="col-md-2 col-form-label"> Horario:</label>
	<div class="col-md-10">
	<?php
 	$options = array();
  	foreach ($jornadadocente as $row){
		$options[$row->idjornadadocente]=$row->nombre." (Inicia::".$row->horainicio.")"." (Dura::".$row->duracionminutos." minutos.)";
	}
 echo form_multiselect('jornadadocente[]',$options,(array)set_value('idjornadadocente', ''), array('style'=>'width:500px')); 

	?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('documentoevento/add/'.$evento['idevento'], 'Documentos:') ?> </label>
     	<?php 
	$options=array();
  	foreach ($documentoeventos as $row){
		$options[$row->iddocumentoevento]=$row->eldocumento;
	}
	?>
	<div class="col-md-10">
		<?php

 echo form_multiselect('documentoevento[]',$options,(array)set_value('iddocumento', ''), array('style'=>'width:500px','name'=>'iddocumentoevento','id'=>'iddocumentoevento','onChange'=>'mostrarref()')); 
		?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> Total inscritos:</label>
	<div class="col-md-10">
     <?php echo form_input('totalinscritos',$evento['totalinscritos'],array("disabled"=>"disabled",'placeholder'=>'titulo','style'=>'width:600px;')) 
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
            <b>Sesiones dictadas: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('sesionevento/add/'.$evento['idevento']) ?>">Nueva sesion</a><a class="btn btn-danger" onclick='reportepdf()' >Reporte</a>
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>sesion</th>
	 <th>unidad</th>
	 <th>fecha</th>
	 <th>inicio</th>
	 <th>termino</th>
	 <th>Eval</th>
	 <th>tema tratado</th>
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
            <b>Los participantes: </b>
        </div>
        <div class="pull-right">
          <a class="btn btn-danger" href="<?php echo base_url('asistencia/add/'.$evento['idevento']) ?>">Tomar Asistencia</a>  <a class="btn btn-success" href="<?php echo base_url('asistencia/reportepdf/'.$evento['idevento']) ?>">Reporte</a><a class="btn btn-warning" href="<?php echo base_url('participante/add/'.$evento['idevento']) ?>">+</a>

        </div>
    </div>
</div>
<table class="table table-striped table-bordered table-hover" id="mydatap">
 <thead>
 <tr>
 <th>Participante</th>
 <th>Cédula</th>
 <th>certificado</th>
 <th>grupo</th>
 <th>quitar</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data1">

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
            <b>Participantes quitados: </b>
        </div>
        
    </div>
</div>
<table class="table table-striped table-bordered table-hover" id="mydataq">
 <thead>
 <tr>
 <th>Participante</th>
 <th>Cédula</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data2">

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
	 <b>Seguimiento silabo: ( <?php echo anchor('seguimientosilabo/add/'.$evento['idevento'], 'New'); ?>):</b>
        </div>

<div class="pull-right">
 <a class="btn btn-success" onclick="save_criterios()"> sumar criterios</a> <a class="btn btn-danger" href="<?php echo base_url('silabo/exportarxls/'.$evento['idevento']) ?>">Informe excel</a>
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatas">
	 <thead>
	 <tr>
	 <th>idseguimientosilabo</th>
	 <th>idsilabo</th>
	 <th>Criterio de evaluación</th>
	 <th>Nivel cumplimiento</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data3">
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
	var idevento=<?php echo $evento['idevento']; ?>; 
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_fechas')?>', type: 'GET',data:{idevento:idevento}},
       "rowCallback": function(row, data, index){
	if (data[5] >1) {
        	$("td:eq(0)", row).css('background-color','#99ff9c')
        	$("td:eq(1)", row).css('background-color','#99ff9c')
        	$("td:eq(2)", row).css('background-color','#99ff9c')
        	$("td:eq(3)", row).css('background-color','#99ff9c')
        	$("td:eq(4)", row).css('background-color','#99ff9c')
        	$("td:eq(5)", row).css('background-color','#99ff9c')
        	$("td:eq(6)", row).css('background-color','#99ff9c')
    	}
       }
    
	
	
	});
	var mytablap= $('#mydatap').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_participantes')?>', type: 'GET',data:{idevento:idevento}},});
	var mytablaq= $('#mydataq').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_noparticipantes')?>', type: 'GET',data:{idevento:idevento}},});
	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('evento/seguimientosilabo_data')?>', type: 'GET',data:{idevento:idevento}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idsesionevento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


$('#show_data1').on('click','.item_ver',function(){
var id= $(this).data('idparticipante');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});

$('#show_data1').on('click','.item_quitar',function(){
var id= $(this).data('idparticipante');
var retorno= $(this).data('retorno');
if( confirm('Los datos se eliminaran ¿esta seguro?'))
{
	window.location.href = retorno+'/'+id;
}
});


$('#show_data2').on('click','.item_retornar',function(){
var id= $(this).data('idparticipante');
var retorno= $(this).data('retorno');
if( confirm('El participante retornará ¿esta seguro?'))
{
	window.location.href = retorno+'/'+id;
}
});




$('#show_data1').on('click','.item_grupo',function(){
var id= $(this).data('idparticipante');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});






$('#show_data').on('click','.item_edit',function(){
var idsesionevento= $(this).data('idsesionevento');
var idevento= $(this).data('idevento');

get_sesionevento(idsesionevento,idevento);

});


$('#show_data3').on('click','.item_verss',function(){

    var id= $(this).data('idseguimientosilabo');
    var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;



});






function get_sesionevento(idsesionevento,idevento) {
    $.ajax({
        url: "<?php echo site_url('sesionevento/get_sesionevento') ?>",
        data: {idsesionevento:idsesionevento},
        method: 'GET',
        async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
	var comentario="";
        var i;
	$('#Modal_Edit').modal('show');
        if(data.length!=1){
          $('[name="idsesionevento_edit"]').val(0);
          $('[name="idevento_edit"]').val(idevento);
          $('[name="fecha_edit"]').val('');
          $('[name="idtema_edit"]').val(0);
          $('[name="tema_edit"]').val('');
          $('[name="temacorto_edit"]').val('');
          $('[name="ponderacion_edit"]').val(0);
          $('[name="horainicio_edit"]').val('');
          $('[name="horafin_edit"]').val('');
          $('[name="idmodoevaluacion_edit"]').val(0);
        }else{
          $('[name="idsesionevento_edit"]').val(data[0].idsesionevento);
          $('[name="idevento_edit"]').val(data[0].idevento);
          $('[name="fecha_edit"]').val(data[0].fecha);
          $('[name="idtema_edit"]').val(data[0].idtema);
          $('[name="tema_edit"]').val(data[0].tema);
          $('[name="temacorto_edit"]').val(data[0].temacorto);
          $('[name="ponderacion_edit"]').val(data[0].ponderacion);
          $('[name="horainicio_edit"]').val(data[0].horainicio);
          $('[name="horafin__edit"]').val(data[0].horafin);
          $('[name="idmodoevaluacion__edit"]').val(data[0].idmodoevaluacion);
        }
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}





function reportepdf(){
let mes = prompt("Ingrese el número del mes", 1);
var href="<?php echo base_url('sesionevento/reportepdf/'.$evento['idevento']) ?>";
if (mes == null || mes == "") {

  href=href+"";
}else{

  href=href+"-"+mes;

}


window.location.href = href;

}



	function save_criterios() {
	    var idevento=<?php echo $evento['idevento']; ?>; 
        alert(idevento); 
	    $.ajax({
		url: "<?php echo site_url('seguimientosilabo/save_criterios') ?>",
		data: {idevento:idevento},
		method: 'POST',
		async : false,
		dataType : 'json',
		success: function(data){
		var html = '';
		var i;
		get_criterios();
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })
	}



	function get_criterios() {
	    var idevento=<?php echo $evento['idevento']; ?>; 
	var mytablaf= $('#mydatas').DataTable({pageLength:15,destroy:true,"ajax": {url: '<?php echo site_url('evento/seguimientosilabo_data')?>', type: 'GET',data:{idevento:idevento}},});

	}





</script>

</body>


</html>
