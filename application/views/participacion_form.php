<style>
.modal.face .modal-dialog{
	transform: translate3d(0,100vh,0);
}

.modal.in .modal-dialog{
	transform: translate3d(0,0,0);
}

</style>


<h2> <?php echo $title; ?>(<?php echo anchor('participacion/reporte/'.$eventos[0]->idevento, 'Reporte'); ?>)</h2>
<hr/>
<!---<?php echo form_open(); ?>-->
<br>


<div class="form-group row">
<label class="col-md-2 col-form-label">Evento:</label>
<div class="col-md-10">
<?php
//print_r($eventos);
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

         <select class="form-control" id="idpersona" name="idpersona" multiple="multiple" required size="30" style="height: 100%;" onChange='get_participacion_xx()'>
                 <option>No Selected</option>
          </select>
  </div>
</div>












<!--- <?php echo form_close();?>  --->

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
						<label class="col-md-2 col-form-label">idparticipacion</label>
						<div class="col-md-10">
							<input type="text" name="idparticipacion_edit" id="idparticipacion_edit" class="form-control" placeholder="idparticipacion">  
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
						<label class="col-md-2 col-form-label">Porcentaje</label>
						<div class="col-md-10">
							<input type="text" name="porcentaje_edit" id="porcentaje_edit" class="form-control" placeholder="porcentaje">  
						</div>
					</div>					

					<div class="form-group row">
						<label class="col-md-2 col-form-label">Ayuda</label>
						<div class="col-md-10">
							<input type="text" name="ayuda_edit" id="ayuda_edit" class="form-control" placeholder="Ayuda">  
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
	});     







function get_participantes() {
	var idevento = $('select[name=idevento]').val();
    $.ajax({
        url: "<?php echo site_url('participacion/get_participantes') ?>",
        data: {idevento:idevento},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
	//document.getElementById('idpersona').setAttribute('size',"'"+data.length*2+"'");

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
        url: "<?php echo site_url('participacion/get_participantes2') ?>",
        data: {idevento:idevento,fecha:fecha},
        method: 'POST',
	      async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        var l=data.length+1;
        document.getElementById('idpersona').setAttribute('size',"'"+l+"'");
        for(i=0; i<data.length; i++){
		if(data[i].porcentaje!=" "){
			html += '<option style="color:green;"  value='+data[i].idpersona+'>'+data[i].idpersona+'- '+data[i].nombres+' - '+data[i].porcentaje+'</option>';
		}else{
			html += '<option style="color:red;" value='+data[i].idpersona+'>'+data[i].idpersona+'- '+data[i].nombres+' - '+data[i].porcentaje+'</option>';
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





function get_participacion() {
	var f = document.getElementById("idsesionevento");
  var fecha=f.options[f.selectedIndex].text;
	var idevento=document.getElementById("idevento").value;
//	var idpersona= $('select[name=idpersona]').val();
	var idpersona=document.getElementById("idpersona").value;
    $.ajax({
        url: "<?php echo site_url('participacion/get_participacionp') ?>",
        data: {idevento:idevento,fecha:fecha,idpersona:idpersona},
        method: 'POST',
        async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
	var comentario="";
        var i;

        if(data.length!=1){

  //        for(i=0; i<data.length; i++){
  //          html += '<option value='+data[i].idtipoparticipacion+'>'+data[i].eltipoparticipacion+'</option>';
  //        }
          document.getElementById("comentario").value="";
	  document.getElementById("selpersona").value=data[i].nombres;
          document.getElementById("porcentaje").value="";
          document.getElementById("ayuda").value="";
        }else{

 //       for(i=0; i<data.length; i++){
//          html += '<option value='+data[i].idtipoparticipacion+'>'+data[i].eltipoparticipacion+'</option>';
          document.getElementById("comentario").value=data[0].comentario;
          document.getElementById("porcentaje").value=data[0].porcentaje;
          document.getElementById("ayuda").value=data[0].ayuda;
//        }
        }
//        $('#idtipoparticipacion').html(html);
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}




function get_participacion2() {
	var fecha = document.getElementById("fecha").value;
	var idevento=document.getElementById("idevento").value;
	var idpersona= $('select[name=idpersona]').val();


    $.ajax({
        url: "<?php echo site_url('participacion/get_participacion') ?>",
        data: {idevento : idevento, fecha : fecha, idpersona : idpersona},
        method: 'POST',
        async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        get_participantes2();
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}




//function save_nota() {
$("#btn_update").on("click", function(){
	var f = document.getElementById("idsesionevento");
  	var arrtmp=f.options[f.selectedIndex].text;
	const x=arrtmp.split(" - ");
	var fecha=x[0];
//	var idparticipacion=document.getElementById("idparticipacion_edit").value;
	var fecha=document.getElementById("fecha_edit").value;
	var idevento=document.getElementById("idevento_edit").value;
	var porcentaje=document.getElementById("porcentaje_edit").value;
	var comentario=document.getElementById("comentario_edit").value;
	var ayuda=document.getElementById("ayuda_edit").value;
	//var idpersona= $('select[name=idpersona]').val();
	var idpersona = document.getElementById("idpersona_edit").value;
       // var idpersona=p.options[p.selectedIndex].value;
    $.ajax({
        url: "<?php echo site_url('participacion/save_nota') ?>",
        data: {idevento:idevento, fecha:fecha,porcentaje:porcentaje,comentario:comentario,idpersona:idpersona, ayuda:ayuda},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        get_participantes2();
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











function get_participacion_xx() {
	var f = document.getElementById("idsesionevento");
  	var arrtmp=f.options[f.selectedIndex].text;
	const x=arrtmp.split(" - ");
	var fecha=x[0];
	var idevento=document.getElementById("idevento").value;
	var idpersona= $('select[name=idpersona]').val();
//	var idpersona=document.getElementById("idpersona").value;
	idpersona=parseInt(idpersona);
    $.ajax({
        url: "<?php echo site_url('participacion/get_participacion') ?>",
        data: {idevento:idevento,fecha:fecha,idpersona:idpersona},
        method: 'GET',
        async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
	var comentario="";
        var i;
	$('#Modal_Edit').modal('show');
        if(data.length!=1){
          $('[name="idparticipacion_edit"]').val(0);
          $('[name="idevento_edit"]').val(idevento);
          $('[name="fecha_edit"]').val(fecha);
          $('[name="lapersona_edit"]').val("");
          $('[name="idpersona_edit"]').val(idpersona);
          $('[name="porcentaje_edit"]').val("");
          $('[name="comentario_edit"]').val("");
          $('[name="ayuda_edit"]').val("");
        }else{
          $('[name="idparticipacion_edit"]').val(data[0].idparticipacion);
          $('[name="idevento_edit"]').val(data[0].idevento);
          $('[name="fecha_edit"]').val(data[0].fecha);
          $('[name="lapersona_edit"]').val(data[0].nombres);
          $('[name="idpersona_edit"]').val(data[0].idpersona);
          $('[name="comentario_edit"]').val(data[0].comentario);
          $('[name="porcentaje_edit"]').val(data[0].porcentaje);
          $('[name="ayuda_edit"]').val(data[0].ayuda);
        }
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}







</script>
