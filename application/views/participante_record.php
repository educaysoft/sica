<style>
.modal.face .modal-dialog{
	transform: translate3d(0,150vh,0);
}

.modal.in .modal-dialog{
	transform: translate3d(0,0,0);
}

</style>


<div id="eys-nav-i">

<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
<?php echo form_open('participante/save_edit') ?>
    <ul>
<?php
if(isset($participante))
{
?>
 
        <li> <?php echo anchor('participante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('participante/anterior/'.$participante['idparticipante'], 'anterior'); ?></li>
        <li> <?php echo anchor('participante/siguiente/'.$participante['idparticipante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('participante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('participante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('participante/edit/'.$participante['idparticipante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('participante/delete/?idparticipante='.$participante['idparticipante'].'&idevento='.$participante['idevento'],'Delete'); ?></li>
        <li> <?php echo anchor('participante/listar/','Listar'); ?></li>

    </ul>
<?php 
}else{
?>

        <li> <?php echo anchor('participante/add', 'Nuevo'); ?></li>
    </ul>
<?php
	die();
}
?>





</div>
<br>


<?php echo form_hidden('idevento',$participante['idevento']) ?>
<table>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Id evento:</label>
	<div class="col-md-10">
		<?php
    echo form_input('idevento',$participante['idevento'],array("id"=>"idevento","disabled"=>"disabled",'placeholder'=>'Ideventos'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('evento/actual/'.$participante['idevento'], 'Evento  '); ?>&#x1F448;</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($eventos as $row){
	$options[$row->idevento]= $row->titulo;
}
echo form_input('idevento',$options[$participante['idevento']],array("disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id persona:</label>
	<div class="col-md-10">
		<?php
     echo form_input('idpersona',$participante['idpersona'],array("id"=>"idpersona","disabled"=>"disabled",'placeholder'=>'Idparticipantees',"style"=>"width:500px")); 
		?>
	</div> 
</div> 



<div class="form-group row">
    <label class="col-md-2 col-form-label">Persona:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->apellidos." ".$row->nombres;
}

echo form_input('nombre',$options[$participante['idpersona']],array("id"=>"nombre","disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div> 
 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id documento:</label>
	<div class="col-md-10">
		<?php
     echo form_input('iddocumento',$participante['iddocumento'],array("id"=>"iddocumento","disabled"=>"disabled",'placeholder'=>'Iddocumento',"style"=>"width:500px")); 
		?>
	</div> 
</div> 





<div class="form-group row">
    <label class="col-md-2 col-form-label">  Certificado (<?php echo "<a onclick='verpdf()'>Ver</a>" ?>) :</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
if(!isset($participante['iddocumento'])){
echo form_input('nmdocumento',"",array("id"=>"nmdocumento","disabled"=>"disabled","style"=>"width:500px")) ;
}else{
echo form_input('nmdocumento',$options[$participante['iddocumento']],array("id"=>"nmdocumento","disabled"=>"disabled","style"=>"width:500px"));
}
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Estado de la participacion:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($participanteestado as $row){
	$options[$row->idparticipanteestado]= $row->nombre;
}
echo form_input('idparticipanteestado',$options[$participante['idparticipanteestado']],array("disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Nivel del participante:</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($nivelparticipante as $row){
	$options[$row->idnivelparticipante]= $row->nombre;
}
echo form_input('idnivelparticipante',$options[$participante['idnivelparticipante']],array("disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label">Grupo letra:</label>
	<div class="col-md-10">
		<?php
     echo form_input('grupoletra',$participante['grupoletra'],array("id"=>"grupoletra","disabled"=>"disabled",'placeholder'=>'Grupo',"style"=>"width:500px")); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fechas ( <?php echo anchor('fechaevento/add/'.$evento['idevento'], 'New'); ?>):</label>
	<div class="col-md-10">
	<div class="row justify-content-center">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>idevento</th>
	 <th>fecha</th>
	 <th>tema</th>
	 <th>Asis</th>
	 <th>Long</th>
	 <th>Lati</th>
	 <th>Parti</th>
	 <th>Pagos</th>
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





<?php echo form_close(); ?>


<script type="text/javascript">





$(document).ready(function(){
	var idevento=document.getElementById("idevento").value;
	var idpersona=document.getElementById("idpersona").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_fechasAsisPartPago')?>', type: 'GET',data:{idevento:idevento,idpersona:idpersona}},});
});

$('#show_data').on('click','.item_ver',function(){
var idevento= $(this).data('idevento');
var fecha= $(this).data('fecha');
var p= $(this).data('participacion');
get_participacion_xx(idevento,fecha,p);
//var retorno= $(this).data('retorno');
//window.location.href = retorno+'/'+id;

});


$('#show_data').on('click','.item_geo',function(){
var latitud= $(this).data('latitud');
var longitud= $(this).data('longitud');
var loc= "http://maps.google.com/maps?z=20&t=m&q=loc:"+latitud+"+"+longitud;
alert(loc);
window.location.href =loc;

});





function get_participacion_xx(ide,f,p) {
	var fecha=f;
	var participacion=p;
	var idevento=ide;
	var idpersona= document.getElementById("idpersona").value;
	var nombre= document.getElementById("nombre").value;
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
          $('[name="lapersona_edit"]').val(nombre);
          $('[name="idpersona_edit"]').val(idpersona);
          $('[name="porcentaje_edit"]').val(participacion);
          $('[name="comentario_edit"]').val("");
          $('[name="ayuda_edit"]').val("");
          $('[name="idtipoparticipacion_edit"]').val("");
        }else{
          $('[name="idparticipacion_edit"]').val(data[0].idparticipacion);
          $('[name="idevento_edit"]').val(data[0].idevento);
          $('[name="fecha_edit"]').val(data[0].fecha);
          $('[name="lapersona_edit"]').val(data[0].nombres);
          $('[name="idpersona_edit"]').val(data[0].idpersona);
          $('[name="comentario_edit"]').val(data[0].comentario);
          $('[name="porcentaje_edit"]').val(data[0].porcentaje);
          $('[name="ayuda_edit"]').val(data[0].ayuda);
          $('[name="idtipoparticipacion__edit"]').val(data[0].idtipoparticipacion);
        }
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}





//function save_nota() {
$("#btn_update").on("click", function(){


//	var f = document.getElementById("idfechaevento");
  //	var arrtmp=f.options[f.selectedIndex].text;
//	const x=arrtmp.split(" - ");
//	var fecha=x[0];
	var f=$('#show_data').data(fecha);
//	var idparticipacion=document.getElementById("idparticipacion_edit").value;
	var fecha=document.getElementById("fecha_edit").value;
	var idevento=document.getElementById("idevento_edit").value;
	var porcentaje=document.getElementById("porcentaje_edit").value;
	var comentario=document.getElementById("comentario_edit").value;
	var ayuda=document.getElementById("ayuda_edit").value;
	var idtipoparticipacion=document.getElementById("idtipoparticipacion_edit").value;
	//var idpersona= $('select[name=idpersona]').val();
	var idpersona = document.getElementById("idpersona_edit").value;
       // var idpersona=p.options[p.selectedIndex].value;
    $.ajax({
        url: "<?php echo site_url('participacion/save_nota') ?>",
        data: {idevento:idevento, fecha:fecha,porcentaje:porcentaje,comentario:comentario,idpersona:idpersona,idtipoparticipacion:idtipoparticipacion, ayuda:ayuda},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
       // get_participantes2();
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







function verpdf(){

var iddocumento=document.getElementById("iddocumento").value;
    $.ajax({
        url: "<?php echo site_url('documento/get_documentoA') ?>",
        data: {iddocumento: iddocumento},
        method: 'POST',
	async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
		var dire=data[i].ruta;
		var orde=data[i].elordenador; 
		var archi=data[i].archivopdf;
        }

	var ordenador = "https://"+orde;
	var ubicacion=dire;
	if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        	ubicacion = ordenador+"/"+ubicacion;
	}else{
		ubicacion = ordenador+ubicacion;
	}
	var archivo =archi;
	var certi= ubicacion.trim()+archivo.trim();
	window.location.href = certi;

        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })


}




</script>



</body>









</html>
