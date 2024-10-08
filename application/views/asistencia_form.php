<div style="margin-top:5cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<?php echo form_open() ?>


<div class="form-group row">
<label class="col-md-2 col-form-label"><a href= "<?php echo base_url(); ?>evento/actual/<?php echo $idevento; ?> "   >Evento: &#x1F448;</a></label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
 echo form_dropdown("idevento",$options, set_select('--Select--','default_value'),array('id'=>'idevento','onchange'=>'get_participantes()'));  

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Fecha de asistencia:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($sesioneventos as $row){
	$options[$row->idsesionevento]=$row->fecha." - ".$row->temacorto;
}
 echo form_dropdown("idsesionevento",$options, set_select('--Select--','default_value'),array('id'=>'idsesionevento','onchange'=>'get_participantes2x()'));  

?>
</div>
</div>


<div class="form-group row">
<label class="col-md-2 col-form-label"> Comentario:</label>
<div class="col-md-10">
<?php


$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"comentario",'id'=>'comentario' );
echo form_textarea("comentario","",$textarea_options);

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
            <b>Los participantes: </b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" onclick="save_asistencia()"> Asistencias a TODOS</a><a class="btn btn-danger" href="<?php echo base_url('asistencia/reporte/'.$idevento) ?>">Reporte</a><a class="btn btn-success" onclick="quitar_asistencia()"> Quitar Asistencias</a>
        </div>
    </div>
</div>


<table class="table table-striped table-bordered table-hover" id="mydatap">
 <thead>
 <tr>
 <th>Participante</th>
 <th>Asistencia</th>
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






















<?php echo form_close();?>



<script>


$(document).ready(function(){
	var idevento= <?php echo $idevento; ?>;
	var fecha="";
//	var mytablap= $('#mydatap').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_asistencia')?>', type: 'GET',data:{idevento:idevento}},});
	var mytablap= $('#mydatap').DataTable({pageLength:50,destroy:true,"ajax": {url: '<?php echo site_url('evento/evento_asistencia2')?>', type: 'GET',data:{idevento:idevento,fecha:fecha}},});
});


	function get_participantes2x() {

		var idevento = $('select[name=idevento]').val();
		var f = document.getElementById("idsesionevento");
		var arrtmp=f.options[f.selectedIndex].text;
		const x=arrtmp.split(" - ");
		var fecha=x[0];
	    if(fecha=="--Select--"){
	      alert("debe seleccionar una fecha");
	   }else{

	var mytablap= $('#mydatap').DataTable({pageLength:50,destroy:true,"ajax": {url: '<?php echo site_url('evento/evento_asistencia2')?>', type: 'GET',data:{idevento:idevento,fecha:fecha}},});
	   }
	}

	$(document).ready(()=>{
		var idevento= <?php echo $idevento; ?>;
		if(idevento>0){
		    $('#idevento option[value="'+idevento+'"]').attr('selected','selected');
		    get_participantes();
		}
	});     



	function get_participantes() {
		var idevento = $('select[name=idevento]').val();
	    $.ajax({
		url: "<?php echo site_url('asistencia/get_participantes') ?>",
		data: {idevento:idevento},
		method: 'GET',
		async : true,
		dataType : 'json',
		success: function(data){
		var html = '';
		var i;
		for(i=0; i<data.length; i++){
		html += '<option value='+data[i].idpersona+'>'+data[i].nombres+'</option>';
		}
		$('#idpersona').html(html);
		var select = document.getElementById('idpersona');
		select.size = select.length;  
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })
	}



	function get_participantes2() {
		var idevento = $('select[name=idevento]').val();
		var f = document.getElementById("idsesionevento");
		var arrtmp=f.options[f.selectedIndex].text;
		const x=arrtmp.split(" - ");
		var fecha=x[0];
	    if(fecha=="--Select--"){
	      alert("debe seleccionar una fecha");
	   }else{
	    $.ajax({
		url: "<?php echo site_url('asistencia/get_participantes2') ?>",
		data: {idevento:idevento,fecha:fecha},
		method: 'POST',
		async : false,
		dataType : 'json',
		success: function(data){
		var html = '';
		var i;
		var l=data.length+1;
//		document.getElementById('idpersona').setAttribute('size',"'"+l+"'");
		for(i=0; i<data.length; i++){
			if(data[i].idtipoasistencia==" "){
				html += '<option style="color:red;" value='+data[i].idpersona+'><i class="fa fa-female"></i>'+data[i].idpersona+' - '+data[i].nombres+' - '+data[i].idtipoasistencia+'</option>';
			}else{
				html += '<option style="color:green;"  value='+data[i].idpersona+'><i class="icon-female"></i> - '+data[i].idpersona+'- '+data[i].nombres+' - '+data[i].idtipoasistencia+'</option>';
			}
		}
		$('#idpersona').html(html);

		var select = document.getElementById('idpersona');
		select.size = select.length;  
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }

	    })
	}
	}








	function get_asistencia() {

		var f = document.getElementById("idsesionevento");
  		var arrtmp=f.options[f.selectedIndex].text;
		const x=arrtmp.split(" - ");
		var fecha=x[0];

		var idevento=document.getElementById("idevento").value;
	//	var idpersona= $('select[name=idpersona]').val();
		var idpersona=document.getElementById("idpersona").value;
	//	element.replaceChild(newNode, element.childNodes[xx]);

	    $.ajax({
		url: "<?php echo site_url('asistencia/get_asistenciap') ?>",
		data: {idevento:idevento,fecha:fecha,idpersona:idpersona},
		method: 'POST',
		async : true,
		dataType : 'json',
		success: function(data){
		var html = '';
		var comentario="";
		var i;
//		if(data.length>1){
//		var xx=document.getElementById("idpersona").selectedIndex;
//		 element = document.getElementById("idpersona")[xx];
//		 element.style.color="red";
//		}else{
//		var xx=document.getElementById("idpersona").selectedIndex;
//		 element = document.getElementById("idpersona")[xx];
//		 element.style.color="green";
//		}

		for(i=0; i<data.length; i++){
		html += '<option value='+data[i].idtipoasistencia+'>'+data[i].tipoasistencia+'</option>';
		document.getElementById("comentario").value=data[i].comentario;
		}
		$('#idtipoasistencia').html(html);


		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })
	}




	function get_asistencia2() {
		var fecha = document.getElementById("fecha").value;
		var idevento=document.getElementById("idevento").value;
		var idpersona= $('select[name=idpersona]').val();

	    $.ajax({
		url: "<?php echo site_url('asistencia/get_asistencia') ?>",
		data: {idevento : idevento, fecha : fecha, idpersona : idpersona},
		method: 'POST',
		async : true,
		dataType : 'json',
		success: function(data){
		var html = '';
		var i;
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })
	}


$('#show_data1').on('click','.item_asit',function(){
		var idtipoasistencia= $(this).data('idtipoasistencia');
		var idpersona= $(this).data('idpersona');

		var f = document.getElementById("idsesionevento");
		var arrtmp=f.options[f.selectedIndex].text;
		const x=arrtmp.split(" - ");
		var fecha=x[0];
		var idevento=document.getElementById("idevento").value;
	//	var idtipoasistencia=document.getElementById("idtipoasistencia").value;
		var comentario=document.getElementById("comentario").value;
//		var idpersona= $('select[name=idpersona]').val();
//		var p = document.getElementById("idpersona");
//		var idpersona=p.options[p.selectedIndex].value;

	    $.ajax({
		url: "<?php echo site_url('asistencia/save_asistencia') ?>",
		data: {idevento:idevento, fecha:fecha,idtipoasistencia:idtipoasistencia,comentario:comentario,idpersona:idpersona},
		method: 'POST',
		async : false,
		dataType : 'json',
		success: function(data){
		var html = '';
		var i;
	//	get_participantes2();
		 get_participantes2x(); 
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })
});





	function save_asistencia() {
		var f = document.getElementById("idsesionevento");
		var arrtmp=f.options[f.selectedIndex].text;
		const x=arrtmp.split(" - ");
		var fecha=x[0];
		var idevento=document.getElementById("idevento").value;
		var idtipoasistencia=1;  //document.getElementById("idtipoasistencia").value;
		var comentario=document.getElementById("comentario").value;
		var idpersona=0 ;  //p.options[p.selectedIndex].value;
 
	    $.ajax({
		url: "<?php echo site_url('asistencia/save_allasistencia') ?>",
		data: {idevento:idevento, fecha:fecha,idtipoasistencia:idtipoasistencia,comentario:comentario,idpersona:idpersona},
		method: 'POST',
		async : false,
		dataType : 'json',
		success: function(data){
		var html = '';
		var i;
		get_participantes2x();
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })
	}




	function quitar_asistencia() {
		var f = document.getElementById("idsesionevento");
		var arrtmp=f.options[f.selectedIndex].text;
		const x=arrtmp.split(" - ");
		var fecha=x[0];
		var idevento=document.getElementById("idevento").value;
		var idpersona=0 ;  //p.options[p.selectedIndex].value;

if( confirm('¿Esta seguro de querer quitar estas asistencias?'))
{

if( confirm('Esta acción quitar todas las asistencias de esta fecha ¿Esta bien seguro?'))
{
	    $.ajax({
		url: "<?php echo site_url('asistencia/quitar_asistencia') ?>",
		data: {idevento:idevento, fecha:fecha},
		method: 'POST',
		async : false,
		dataType : 'json',
		success: function(data){
		var html = '';
		var i;
		get_participantes2x();
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })
	}
  }
}




</script>
