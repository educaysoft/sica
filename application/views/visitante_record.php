<style>
.modal.face .modal-dialog{
	transform: translate3d(0,150vh,0);
}

.modal.in .modal-dialog{
	transform: translate3d(0,0,0);
}

</style>


<div id="eys-nav-i">
	<div style="text-align: left; font-size:large"> <?php echo $title  ?><idem style="font-size:large" id="idvisitante"><?php echo $visitante['idvisitante']; ?></idem></div>

<?php
if(isset($visitante))
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
        <li> <?php echo anchor('visitante/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('visitante/anterior/'.$visitante['idvisitante'], 'anterior'); ?></li>
        <li> <?php echo anchor('visitante/siguiente/'.$visitante['idvisitante'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('visitante/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('visitante/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('visitante/edit/'.$visitante['idvisitante'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('visitante/delete?idvisitante='.$visitante['idvisitante'],'Delete'); ?></li>
        <li> <?php echo anchor('visitante/listar/','Listar'); ?></li>

	<?php } ?>
<?php 
}else{
?>

        <li> <?php echo anchor('visitante/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>

</div>
<br>


<?php echo form_open('visitante/save_edit') ?>
<?php echo form_hidden('idvisitante',$visitante['idvisitante']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label">Id visitante:</label>
	<div class="col-md-10">
		<?php
    echo form_input('idvisitante',$visitante['idvisitante'],array("id"=>"idvisitante","disabled"=>"disabled",'placeholder'=>'Idvisitante'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('departamento/actual/'.$visitante['iddepartamento'], 'Oficina:  '); ?>&#x1F448;</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($departamentos as $row){
	$options[$row->iddepartamento]= $row->nombre;
}
echo form_input('iddepartamento',$options[$visitante['iddepartamento']],array("disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id persona:</label>
	<div class="col-md-10">
		<?php
     echo form_input('idpersona',$visitante['idpersona'],array("id"=>"idpersona","disabled"=>"disabled",'placeholder'=>'Idvisitantees',"style"=>"width:500px")); 
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

$elvisitante=$options[$visitante['idpersona']];
echo form_input('nombre',$options[$visitante['idpersona']],array("id"=>"nombre","disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div> 
 
<div class="form-group row">
    <label class="col-md-2 col-form-label">Fecha:</label>
	<div class="col-md-10">
		<?php
    echo form_input('fecha',$visitante['fecha'],array("id"=>"fecha","disabled"=>"disabled",'placeholder'=>'fecha'));
		?>
	</div> 
</div> 


<div class="form-group row">
    <label class="col-md-2 col-form-label">Hora:</label>
	<div class="col-md-10">
		<?php
    echo form_input('hora',$visitante['hora'],array("id"=>"hora","disabled"=>"disabled",'placeholder'=>'hora'));
		?>
	</div> 
</div>








 

<div class="form-group row">
<label class="col-md-2 col-form-label">Motivo de visita:</label>

<div class="col-md-10">
<?php
    
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"Motivo de la visita" );    
 echo form_textarea("motivo",$visitante['motivo'] , $textarea_options);  

?>
</div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Ruta firma:</label>
	<div class="col-md-10">
		<?php
    echo form_input('rutafirma',$visitante['rutafirma'],array("id"=>"rutafirma","disabled"=>"disabled",'placeholder'=>'rutafirma'));
		?>
	</div> 
</div>
 











<div class="form-group row">
    <label class="col-md-2 col-form-label">Grupo letra:</label>
	<div class="col-md-10" style="border:1px solid blue; width=50%">
		<?php

 echo '<img src="'.$visitante['rutafirma'].'"/>';
		?>
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
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_fechasAsisPartPago')?>', type: 'GET',data:function(d){d.idevento=idevento; d.idpersona=idpersona}},});
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
	//var idpersona= $('select[name=idpersona]').val();
	var idpersona = document.getElementById("idpersona_edit").value;
       // var idpersona=p.options[p.selectedIndex].value;
    $.ajax({type:"POST",
        url: "<?php echo site_url('participacion/save_nota') ?>",
        data: {idevento:idevento, fecha:fecha,porcentaje:porcentaje,comentario:comentario,idpersona:idpersona, ayuda:ayuda},
        dataType : 'JSON',
        success: function(data){
		data.idevento=idevento;
		data.idpersona=idpersona;

	$("#Modal_Edit").modal("hide"); 
	mytablaf.ajax.reload(null,false);
	},
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    });
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
