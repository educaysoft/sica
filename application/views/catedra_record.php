<style>
.modal.face .modal-dialog{
	transform: translate3d(0,200vh,0);
}

.modal.in .modal-dialog{
	transform: translate3d(0,0,0);
}

</style>



<div id="eys-nav-i">
	<div style="text-align: left; font-size:large"> <?php echo $title  ?><idem style="font-size:large" id="idcatedra"><?php echo $catedra['idcatedra']; ?></idem></div>
	

<ul>
<?php
if(isset($catedra))
{

	$permitir=0;
	$j=0;
	$numero=$j;
	if(isset($this->session->userdata['acceso'])){
  		foreach($this->session->userdata['acceso'] as $row)
	    	{
			if("catedra"==$row["modulo"]["nombre"]);
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
	<li> <?php echo anchor('catedra/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('catedra/siguiente/'.$catedra['idcatedra'], 'siguiente'); ?></li>
        <li> <?php echo anchor('catedra/anterior/'.$catedra['idcatedra'], 'anterior'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('catedra/elultimo/', 'Último'); ?></li>

	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['create']){ ?>
        <li> <?php echo anchor('catedra/add', 'Nuevo'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['update']){ ?>
        <li> <?php echo anchor('catedra/edit/'.$catedra['idcatedra'],'Edit'); ?></li>
	<?php } ?>

	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['delete']){ ?>
        <li style="border-right:1px solid green"> <?php echo anchor('catedra/delete/'.$catedra['idcatedra'],'Delete'); ?></li>
	<?php } ?>

	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['read']){ ?>
        <li> <?php echo anchor('catedra/listar/','Catedras'); ?></li>
	<?php } ?>


	<?php 	if($this->session->userdata['acceso'][$numero]['nivelacceso']['read']){ ?>
        <li style="border-right:1px solid green"> <?php echo anchor('catedra/detalle/'.$catedra['idcatedra'],'Detalles'); ?></li>
	<?php } ?>

        <li> <?php echo anchor('catedra/listar_participantes/'.$catedra['idcatedra'],'Certificados'); ?></li>
        <li> <?php echo anchor('asistencia/add/'.$catedra['idcatedra'],'Asistencias'); ?></li>
        <li> <?php echo anchor('participacion/add/'.$catedra['idcatedra'],'Participacion'); ?></li>
        <li> <?php echo anchor('seguimiento/add/'.$catedra['idcatedra'],'Seguimiento'); ?></li>
        <li> <?php echo anchor('pagocatedra/add/'.$catedra['idcatedra'],'Pagos'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('catedra_estado/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>


<?php echo form_open('catedra/save_edit') ?>
<?php echo form_hidden('idcatedra',$catedra['idcatedra'],array('name'=>'idcatedra')) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('tipocatedra/add', 'Tipo catedra:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($tipocatedras as $row){
	      $options[$row->idtipocatedra]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idtipocatedra','value'=>$options[$catedra['idtipocatedra']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>

	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('catedra_estado/add', 'Catedra estado:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($catedra_estados as $row){
	      $options[$row->idcatedra_estado]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idcatedra_estado','value'=>$options[$catedra['idcatedra_estado']],"disabled"=>"disabled", "style"=>"width:500px");
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
    $arrdatos=array('name'=>'idinstitucion','value'=>$options[$catedra['idinstitucion']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Titulo del catedra:</label>
	<div class="col-md-10">
     <?php echo form_input('titulo',$catedra['titulo'],array("disabled"=>"disabled",'placeholder'=>'titulo','style'=>'width:500px;')) 
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Detalle:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:500px;height:100px;');    
	echo form_textarea('detalle',$catedra['detalle'],$textarea_options);
	?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de inicio:</label>
	<div class="col-md-10">
      <?php echo form_input('fechainicia',$catedra['fechainicia'],array('type'=>'date', "disabled"=>"disabled",'placeholder'=>'fechainicia','style'=>'width:500px;')) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha de finaliza:</label>
	<div class="col-md-10">
      <?php echo form_input('fechafinaliza',$catedra['fechafinaliza'],array('type'=>'date', "disabled"=>"disabled",'placeholder'=>'fechafinaliza','style'=>'width:500px;')) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Sesiones ( <?php echo anchor('sesioncatedra/add/'.$catedra['idcatedra'], 'New'); ?>):</label>
	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>id</th>
	 <th>ponderacion</th>
	 <th>fecha</th>
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
    <label class="col-md-2 col-form-label"> <?php echo anchor('certificado/add', 'Certificado modelo:') ?> </label>
     	<?php 

	$options = array();
  	foreach ($certificados as $row){
		$options[$row->idcertificado]=$row->asunto;
	}

	?>
	<div class="col-md-10">
		<?php
			 echo form_multiselect('idcertificado[]',$options,(array)set_value('idcertificado', ''), array('onChange="ver_certicado()"', 'style'=>'width:500px')); 
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
    $arrdatos=array('name'=>'idpagina','value'=>$options[$catedra['idpagina']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Duración:</label>
	<div class="col-md-10">
     <?php echo form_input('duracion',$catedra['duracion'],array("disabled"=>"disabled",'placeholder'=>'duracion','style'=>'width:500px;')) 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Costo:</label>
	<div class="col-md-10">
     <?php echo form_input('costo',$catedra['costo'],array("disabled"=>"disabled",'placeholder'=>'costo','style'=>'width:500px;')) 
		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('silabo/actual/'.$catedra['idsilabo'], 'Silabo:') ?> </label>
     <?php 
    $options= array("NADA");
    foreach ($silabos as $row){
	      $options[$row->idsilabo]= $row->nombre;
    }
	?>
	<div class="col-md-10">
		<?php
    $arrdatos=array('name'=>'idsilabo','value'=>$options[$catedra['idsilabo']],"disabled"=>"disabled", "style"=>"width:500px");
echo form_input($arrdatos) ?>
	</div> 
</div>




<div class="form-group row">
    <label class="col-md-2 col-form-label"> <?php echo anchor('participante/add', 'Participante'); ?>:</label>
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
<label class="col-md-2 col-form-label">Catedra: </label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($catedras as $row){
	$options[$row->idcatedra]= $row->titulo;
}
 echo form_dropdown("idcatedra_edit",$options, set_select('--Select--','default_value'),array('id'=>'idcatedra_edit'));  
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
	var idcatedra=document.getElementById("idcatedra").innerHTML;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('catedra/catedra_fechas')?>', type: 'GET',data:{idcatedra:idcatedra}},});
	var mytablap= $('#mydatap').DataTable({"ajax": {url: '<?php echo site_url('catedra/catedra_participantes')?>', type: 'GET',data:{idcatedra:idcatedra}},});
});

$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idsesioncatedra');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


$('#show_data1').on('click','.item_ver',function(){
var id= $(this).data('idparticipante');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});



$('#show_data').on('click','.item_edit',function(){
var idsesioncatedra= $(this).data('idsesioncatedra');
var idcatedra= $(this).data('idcatedra');

get_sesioncatedra(idsesioncatedra,idcatedra);

});




function get_sesioncatedra(idsesioncatedra,idcatedra) {
    $.ajax({
        url: "<?php echo site_url('sesioncatedra/get_sesioncatedra') ?>",
        data: {idsesioncatedra:idsesioncatedra},
        method: 'GET',
        async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
	var comentario="";
        var i;
	$('#Modal_Edit').modal('show');
        if(data.length!=1){
          $('[name="idsesioncatedra_edit"]').val(0);
          $('[name="idcatedra_edit"]').val(idcatedra);
          $('[name="fecha_edit"]').val('');
          $('[name="idtema_edit"]').val(0);
          $('[name="tema_edit"]').val('');
          $('[name="temacorto_edit"]').val('');
          $('[name="ponderacion_edit"]').val(0);
          $('[name="horainicio_edit"]').val('');
          $('[name="horafin_edit"]').val('');
          $('[name="idmodoevaluacion_edit"]').val(0);
        }else{
          $('[name="idsesioncatedra_edit"]').val(data[0].idsesioncatedra);
          $('[name="idcatedra_edit"]').val(data[0].idcatedra);
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
	var idsesioncatedra=document.getElementById("idsesioncatedra_edit").value;
	var idcatedra=document.getElementById("idcatedra_edit").value;
	var fecha=document.getElementById("fecha_edit").value;
	var idtema=document.getElementById("idtema_edit").value;
	var temacorto=document.getElementById("temacorto_edit").value;
	var ponderacion=document.getElementById("ponderacion_edit").value;
	var horainicio=document.getElementById("horainicio_edit").value;
	var horafin=document.getElementById("horafin_edit").value;
	var idmodoevaluacion=document.getElementById("idmodoevaluacion_edit").value;
    $.ajax({
        url: "<?php echo site_url('participacion/save_nota') ?>",
        data: {idsesioncatedra:idsesioncatedra,idcatedra:idcatedra, fecha:fecha,idtema:idtema,temacorto:temacorto,ponderacion:ponderacion,horainicio:horainicio,horafin:horafin,idmodoevaliuacion:idmodoevaluacion},
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
