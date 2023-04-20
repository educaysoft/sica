<style>
	.modal.face .modal-dialog{
		transform: translate3d(0,100vh,0);
	}

	.modal.in .modal-dialog{
		transform: translate3d(0,0,0);
	}

</style>




<div style="margin-top:2cm;">
<h2> <?php echo $title; ?> </h2>
</div>
<hr/>
<!-----<?php echo form_open() ?>----->


<div class="form-group row">
<label class="col-md-2 col-form-label">Evento:</label>
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
<label class="col-md-2 col-form-label">Fecha evaluacion:</label>
<div class="col-md-10">
<?php

$options= array('--Select--');
foreach ($sesioneventos as $row){
	$options[$row->idsesionevento]= $row->fecha." - ".$row->tema;
}
 echo form_dropdown("idsesionevento",$options, set_select('--Select--','default_value'),array('id'=>'idsesionevento','onchange'=>'get_participantes2()'));  

?>
</div>
</div>



<div class="form-group row">
<label class="col-md-2 col-form-label">Participantes:</label>
<div class="col-md-10">


         <select class="form-control" id="idpersona" name="idpersona" multiple required size="30" style="height: 100%;"   onChange='get_seguimiento_xx()'>
                 <option>No Selected</option>
          </select>
    </div>

</div>













<!----- <?php echo form_close();?>---->






<!--- MODAL ADD ---->

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
						<label class="col-md-2 col-form-label">idseguimiento</label>
						<div class="col-md-10">
							<input type="text" name="idseguimiento_edit" id="idseguimiento_edit" class="form-control" placeholder="idseguimiento">  
						</div>
					</div>					
					<div class="form-group row">
						<label class="col-md-2 col-form-label">idevento</label>
						<div class="col-md-10">
							<input type="text" name="idevento_edit" id="idevento_edit" class="form-control" placeholder="idevento">  
						</div>
					</div>					


					<div class="form-group row">
						<label class="col-md-2 col-form-label">Fecha</label>
						<div class="col-md-10">
							<input type="text" name="fecha_edit" id="fecha_edit" class="form-control" placeholder="fecha">  
						</div>
					</div>					

					<div class="form-group row">
						<label class="col-md-2 col-form-label">idpersona</label>
						<div class="col-md-10">
							<input type="text" name="idpersona_edit" id="idpersona_edit" class="form-control" placeholder="idperaon">  
						</div>
					</div>					


					<div class="form-group row">
						<label class="col-md-2 col-form-label">Alumno</label>
						<div class="col-md-10">
							<input type="text" name="lapersona_edit" id="lapersona_edit" class="form-control" placeholder="alumno">  
						</div>
					</div>					

					<div class="form-group row">
						<label class="col-md-2 col-form-label">Correo:</label>
						<div class="col-md-10">
							<input type="text" name="correo_edit" id="correo_edit" class="form-control" placeholder="alumno">  
						</div>
					</div>


										
					<div class="form-group row">
					<label class="col-md-2 col-form-label"> Comentario:</label>
					<div class="col-md-10">
					<?php
					$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"comentario",'id'=>'comentario_edit' );
					echo form_textarea("comentario_edit","",$textarea_options);

					?>
					</div>
					</div>


					<div class="form-group row">
					<label class="col-md-2 col-form-label">Tipo seguimiento:</label>
					<div class="col-md-10">
					<?php
					$options= array('--Select--');
					foreach ($tiposeguimientos as $row){
						$options[$row->idtiposeguimiento]= $row->nombre;
					}
					 echo form_dropdown("idtiposeguimiento_edit",$options, set_select('--Select--','default_value'),array('id'=>'idtiposeguimiento_edit'));  

					?>
					</div>
					</div>

					<?php
echo '<a class="btn"  onclick="enviar_correo()"><i class="fa fa-female"></i>Enviar correo.</a>';


					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="submit" id="btn_update" class="btn btn-primary">Guardar</button>
				</div>
			</div>

		</div>
	</div>


</form>


























<script>


	$(document).ready(()=>{
		var idevento= <?php echo $idevento; ?>;
		if(idevento>0){
		    $('#idevento option[value="'+idevento+'"]').attr('selected','selected');
		    get_participantes();
		}

	 tinymce.init({
		 selector:'#comentario_edit',
		 width:600,
		 height:300

	});
 




	});     




	function get_participantes() {
		var idevento = $('select[name=idevento]').val();
	    $.ajax({
		url: "<?php echo site_url('seguimiento/get_participantes') ?>",
		data: {idevento:idevento},
		method: 'POST',
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
		url: "<?php echo site_url('seguimiento/get_participantes2') ?>",
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
			if(data[i].idtiposeguimiento==" "){
				html += '<option style="color:red;" value='+data[i].idpersona+'><i class="fa fa-female"></i>'+data[i].idpersona+' - '+data[i].nombres+' - '+data[i].idtiposeguimiento+'</option>';
			}else{
				html += '<option style="color:green;"  value='+data[i].idpersona+'><i class="icon-female"></i> - '+data[i].idpersona+'- '+data[i].nombres+' - '+data[i].idtiposeguimiento+'</option>';
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








	function get_seguimiento() {

		var f = document.getElementById("idsesionevento");
  		var arrtmp=f.options[f.selectedIndex].text;
		const x=arrtmp.split(" - ");
		var fecha=x[0];

		var idevento=document.getElementById("idevento").value;
	//	var idpersona= $('select[name=idpersona]').val();
		var idpersona=document.getElementById("idpersona").value;
	//	element.replaceChild(newNode, element.childNodes[xx]);

	    $.ajax({
		url: "<?php echo site_url('seguimiento/get_seguimientop') ?>",
		data: {idevento:idevento,fecha:fecha,idpersona:idpersona},
		method: 'POST',
		async : true,
		dataType : 'json',
		success: function(data){
		var html = '';
		var comentario="";
		var i;
		for(i=0; i<data.length; i++){
		html += '<option value='+data[i].idtiposeguimiento+'>'+data[i].tiposeguimiento+'</option>';
                tinyMCE.activeEditor.setContent(data[i].comentario);
		document.getElementById("selpersona").value=data[i].lapersona;
		document.getElementById("correo").value=data[i].correo;
		}
		$('#idtiposeguimiento').html(html);


		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })
	}




	function get_seguimiento2() {
		var fecha = document.getElementById("fecha").value;
		var idevento=document.getElementById("idevento").value;
		var idpersona= $('select[name=idpersona]').val();

	    $.ajax({
		url: "<?php echo site_url('seguimiento/get_seguimiento') ?>",
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




//	function save_seguimiento() {
$("#btn_update").on("click", function(){
		var f = document.getElementById("idsesionevento");
		var arrtmp=f.options[f.selectedIndex].text;
		const x=arrtmp.split(" - ");
		var fecha=x[0];
		var fecha=document.getElementById("fecha_edit").value;
		var idevento=document.getElementById("idevento_edit").value;
		var idtiposeguimiento=document.getElementById("idtiposeguimiento_edit").value;
                var comentario=tinyMCE.activeEditor.getContent();
		var idpersona= $('select[name=idpersona]').val();
	//	var p = document.getElementById("a");
	//		var idpersona=p.options[p.selectedIndex].value;
		var idpersona = document.getElementById("idpersona_edit").value;

	    $.ajax({
		url: "<?php echo site_url('seguimiento/save_seguimiento') ?>",
		data: {idevento:idevento, fecha:fecha,idtiposeguimiento:idtiposeguimiento,comentario:comentario,idpersona:idpersona},
		method: 'POST',
		async : false,
		dataType : 'json',
		success: function(data){
		var html = '';
		var ioo;
		get_participantes2();
		enviar_correo();
		alert("Se guardo con exito");
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })
    		return false;
	});


	function enviar_correo(){
		 var email="educacioncontinua@utelvt.edu.ec";
		 var nome= document.getElementById("lapersona_edit").value; 		
                 var msg=tinyMCE.activeEditor.getContent({format:'text'});
		 var mailto=document.getElementById("correo_edit").value; //   "stalin.francis@utelvt.edu.ec";
		 var secure="siteform";
		 var head="";
			
		var foot0="<br><div style='text-align:center; background-color:lightgrey;'> Aprovechamos la oportunidad para informarte que la Universidad Técnica Luis Vargas Torres esta ejecutando los siguientes programas de capacitación para el perfeccionamiento de nuestros docentes.<br><br> <a href='https://educaysoft.org/sica/curso/CursosEducacionContinua2023'>Cursos de Educación Continua</a><br><br></div>" ;
		 var foot=" <div style='text-align:center; background-color:lightgrey; font-size:12px;'> Este correo ha sido enviado a "+mailto+ ", de acuerdo a la Ley Orgánica de Protección de datos, usted tiene el derecho a solicitar a la Universidad Técnica Luis Vargas Torres, la actualización, inclusión, supresión y/o tratamiento de los datos personales incluidos en sus bases de datos, con este correo electrónico usted acepta recibir información de las actividades académicas que realiza el Alma Mater así como nuestra propuestas académicas <br><br> Este correo fue generado y enviado automáticamente desde el sistema cloud elaborado de la Maestría en Tecnología de la Información</div> ";

		msg=head+msg+foot0+foot;

	    $.ajax({
		url: "<?php echo site_url('seguimiento/send') ?>",
		data: {nome:nome, email:email, msg:msg, mailto:mailto, secure:secure},
		method: 'POST',
		async : false,
		success: function(data){
		var html = '';
		var i;
	//	get_participantes2();
		alert(data);
		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })



       }




function get_seguimiento_xx() {
	var f = document.getElementById("idsesionevento");
  	var arrtmp=f.options[f.selectedIndex].text;
	const x=arrtmp.split(" - ");
	var fecha=x[0];
	var idevento=document.getElementById("idevento").value;
	var idpersona= $('select[name=idpersona]').val();
//	var idpersona=document.getElementById("idpersona").value;
	idpersona=parseInt(idpersona);
    $.ajax({
        url: "<?php echo site_url('seguimiento/get_seguimientop') ?>",
        data: {idevento:idevento,fecha:fecha,idpersona:idpersona},
        method: 'POST',
        async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
	var comentario="";
        var i;


	$('#Modal_Edit').modal('show');
        if(data.length!=1){
          $('[name="idseguimiento_edit"]').val(0);
          $('[name="idevento_edit"]').val(idevento);
          $('[name="fecha_edit"]').val(fecha);
          $('[name="correo_edit"]').val("");
          $('[name="lapersona_edit"]').val("");
          $('[name="idpersona_edit"]').val(idpersona);
          $('[name="comentario_edit"]').val("");
          tinyMCE.activeEditor.setContent(data[0].comentario);
          $('[name="idtiposeguimiento_edit"]').val("");
        }else{
          $('[name="idseguimiento_edit"]').val(data[0].idseguimiento);
          $('[name="idevento_edit"]').val(data[0].idevento);
          $('[name="idpersona_edit"]').val(idpersona);
          $('[name="fecha_edit"]').val(data[0].fecha);
          $('[name="correo_edit"]').val(data[0].correo);
          $('[name="lapersona_edit"]').val(data[0].lapersona);
          $('[name="comentario_edit"]').val(data[0].comentario);
        //  $('[name="comentario_edit"]').val(data[0].comentario);
          $('[name="idtiposeguimiento__edit"]').val(data[0].idtiposeguimiento);
          tinyMCE.activeEditor.setContent(data[0].comentario);
        }
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}















</script>
