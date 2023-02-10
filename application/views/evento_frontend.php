<style>
.modal.face .modal-dialog{
	transform: translate3d(0,200vh,0);
}

.modal.in .modal-dialog{
	transform: translate3d(0,0,0);
}

</style>



<div id="eys-nav-i">
	<div style="text-align: left; font-size:large"> <?php echo $title  ?><idem style="font-size:large" id="idevento"><?php echo $evento['idevento']; ?></idem></div>
	
</div>
<br>


<?php echo form_open('evento/save_edit') ?>
<?php echo form_hidden('idevento',$evento['idevento'],array('name'=>'idevento')) ?>


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
    <label class="col-md-2 col-form-label"> <?php echo anchor('institucion/add', 'Institucion:') ?> </label>
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
    <label class="col-md-2 col-form-label"> Costo:</label>
	<div class="col-md-10">
     <?php echo form_input('costo',$evento['costo'],array("disabled"=>"disabled",'placeholder'=>'costo','style'=>'width:600px;')) 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('calendarioacademico/actual/'.$evento['idcalendarioacademico'], 'Calendario academico:') ?> </label>
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
    <label class="col-md-2 col-form-label"> <?php echo anchor('asignaturadocente/actual/'.$evento['idasignaturadocente'], 'Asignaturadocente:') ?> </label>
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
    <label class="col-md-2 col-form-label"> <?php echo anchor('silabo/actual/'.$evento['idsilabo'], 'Silabo:') ?> </label>
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
    <label class="col-md-2 col-form-label"> Código classroom:</label>
	<div class="col-md-10">
     <?php echo form_input('codigoclassroom',$evento['codigoclassroom'],array("disabled"=>"disabled",'placeholder'=>'codigoclassroom','style'=>'width:600px;')) 
		?>
	</div> 
</div>



<div class="form-group row" style="border:solid;" >
    <label class="col-md-2 col-form-label"> Sesiones ( <?php echo anchor('sesionevento/add/'.$evento['idevento'], 'New'); ?>):</label>
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>id</th>
	 <th>fecha</th>
	 <th>inicio</th>
	 <th>termino</th>
	 <th>sesion</th>
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
    <label class="col-md-2 col-form-label"> <?php echo anchor('participante/add/'.$evento['idevento'], 'Participante'); ?>:</label>
	<div class="col-md-10">
 
<div class="row justify-content-left">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             

<table class="table table-striped table-bordered table-hover" id="mydatap">
 <thead>
 <tr>
 <th>id</th>
 <th>Participante</th>
 <th>certificado</th>
 <th>grupo</th>
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



<form>
<div class="modal fade" id="Modal_Edit" tabindex="-1"  role="dialog" arias-labelledby="exampleModalLabel" aria-hidden="true" >
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar notas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">



<div class="form-group row">
<label class="col-md-2 col-form-label">Evento: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
 echo form_dropdown("idevento_edit",$options, set_select('--Select--','default_value'),array('id'=>'idevento_edit'));  
?>
</div>
</div>



									
									


<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha de la sesión:</label>
<div class="col-md-10">
<?php

   date_default_timezone_set('America/Guayaquil');
    $date = date("Y-m-d");
    $horai= date("H:i:s");
    

    $horaf= date("H:i:s",strtotime(' + 2 hours'));

 echo form_input(array("name"=>"fecha_edit","id"=>"fecha_edit","type"=>"date","value"=>$date));  

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Tema programado:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($temas as $row){
	$options[$row->idtema]="Unidad: ".$row->unidad." - Sesion: ".$row->numerosesion." - ".$row->nombrecorto;
}
 echo form_dropdown("idtema_edit",$options,$date, array('id'=>'idtema_edit'));  
?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema a tratar:</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Tema a  tratar" );    
 echo form_textarea("tema_edit","", $textarea_options,  array('id'=>'tema_edit'));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Tema nombre(corto):</label>
<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Tema a  tratar" );    
 echo form_textarea("temacorto_edit","", $textarea_options,  array('id'=>'temacorto_edit')  );  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Ponderacion:</label>
<div class="col-md-10">
<?php

 echo form_input("ponderacion_edit","", array("id"=>"ponderacion_edit","placeholder"=>"Ponderacion"));

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Hora inicio:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"horainicio_edit","id"=>"horainicio_edit","type"=>"time","value"=>$horai));  

?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Hora fin:</label>
<div class="col-md-10">
<?php

 echo form_input(array("name"=>"horafin_edit","id"=>"","type"=>"time","value"=>$horaf));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Modo de evaluación:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre;
}

 echo form_dropdown("idmodoevaluacion_edit",$options, set_select('--Select--','default_value'),array('id'=>'idmodoevaluacion_edit'));  
?>
</div>
</div>


									

									


									

									

									
									
				


				


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="submit" id="btn_update" class="btn btn-primary">Guardar</button>
			</div>
		</div>

	</div>
</div>


</form>






































<?php echo form_close(); ?>



<script type="text/javascript">

$(document).ready(function(){
	var idevento=document.getElementById("idevento").innerHTML;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_fechas')?>', type: 'GET',data:{idevento:idevento}},});
	var mytablap= $('#mydatap').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_participantes')?>', type: 'GET',data:{idevento:idevento}},});
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


/*
$("#btn_update").on("click", function(){

	var f=$('#show_data').data(fecha);
	var idsesionevento=document.getElementById("idsesionevento_edit").value;
	var idevento=document.getElementById("idevento_edit").value;
	var fecha=document.getElementById("fecha_edit").value;
	var idtema=document.getElementById("idtema_edit").value;
	var temacorto=document.getElementById("temacorto_edit").value;
	var ponderacion=document.getElementById("ponderacion_edit").value;
	var horainicio=document.getElementById("horainicio_edit").value;
	var horafin=document.getElementById("horafin_edit").value;
	var idmodoevaluacion=document.getElementById("idmodoevaluacion_edit").value;
    $.ajax({
        url: "<?php echo site_url('participacion/save_nota') ?>",
        data: {idsesionevento:idsesionevento,idevento:idevento, fecha:fecha,idtema:idtema,temacorto:temacorto,ponderacion:ponderacion,horainicio:horainicio,horafin:horafin,idmodoevaliuacion:idmodoevaluacion},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
	$("#Modal_Edit").modal("hide");
        alert("Se guardo con exito");
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })
    return false;

});

 */






</script>

</body>


</html>
