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
        <li style="border-right:1px solid green"> <?php echo anchor('evento/delete/'.$evento['idevento'],'Delete'); ?></li>
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
    <label class="col-md-2 col-form-label"> Registra a la clase:</label>
	<div class="col-md-10">
      <?php
	$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20',"disabled"=>"disabled", 'style'=> 'width:600px;height:100px;');    
	echo form_textarea('codigoclassroom',$evento['codigoclassroom'],$textarea_options);
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
	 <th>id</th>
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

 $dias = array('Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado');
   date_default_timezone_set('America/Guayaquil');
    $date = date("Y-m-d");
    $horai= date("H:i:s");
    

    $horaf= date("H:i:s",strtotime(' + 2 hours'));

	$sesionactual=0;
	$sesiontotal=0;

 $fechasesion=$calendarioacademico[0]->fechadesde;
 $sesiones=array();
     $i=1;
    do {
	
	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fechasesion))];
		if($row->nombre==$dia ){
			$lahorai=$row->horainicio;
			$lahoraf=strtotime(' + 2 hours',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
			array_push($sesiones,array("sesion"=>$i,"fecha"=>$fechasesion,"dia"=>$dia,"horainicio"=>$lahorai,"horafin"=>$lahoraf));
			if(strtotime($fechasesion)==strtotime($fecha)){
				$sesionactual=$i;
			}
			$sesiontotal=$sesiontotal+1;
			$i=$i+1;
		}
	}
		$fechasesion=date("Y-m-d",strtotime($fechasesion."+ 1 days")); 

    }while(strtotime($fechasesion)<=strtotime($calendarioacademico[0]->fechahasta));


   // print_r($sesiones);
   // echo $fecha;
  //die(); 
	$eldia="No encontrado";	
    	$lahorai="00:00:00";
    	$lahoraf="00:00:00";





	foreach ($jornadadocente as $row){
    		$dia = $dias[date('w', strtotime($fecha))];
		//$echo $dia. " = ".$row->nombre."\n";
		if($row->nombre==$dia ){
			$eldia=$dia;
			$lahorai=$row->horainicio;
			$lahoraf=strtotime(' + 2 hours',strtotime($lahorai));
			$lahoraf=date("H:i:s",$lahoraf);
		}
	}
	//die();

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

 echo form_input(array("name"=>"horainicio_edit","id"=>"horainicio_edit","type"=>"time","value"=>$horai));  ; echo $lahorai;

?>
</div>
</div>

<div class="form-group row">
<label class="col-md-2 col-form-label">Hora fin:</label>
<div class="col-md-10">
<?php
 $horaf="";
 echo form_input(array("name"=>"horafin_edit","id"=>"","type"=>"time","value"=>$horaf));   echo $lahoraf;


?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label">Modo de evaluación:</label>
<div class="col-md-10">
<?php
$options= array('--Select--');
foreach ($modoevaluacions as $row){
	$options[$row->idmodoevaluacion]= $row->nombre."(Porderación=".$row->ponderacion.")";
}

 $primero= reset($options);
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
	var mytablaq= $('#mydataq').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_noparticipantes')?>', type: 'GET',data:{idevento:idevento}},});
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
//




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
