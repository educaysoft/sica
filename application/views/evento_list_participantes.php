<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top:  0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

</style>


<div class="row justify-content-center">
      <!-- Page Heading -->
 <div class="row">
  <div class="col-12">
             <div class="col-md-12">
                 <h3>Generación e impresión de certificados 
			  
        	</h3>
       	     </div>

<div id="filtro"><?php echo $filtro; ?></div>
<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>IDevento</th>
 <th>Nombre</th>
 <th>participante</th>
 <th>Estado</th>
 <th>Institucion</th>
 <th style="text-align: right;">Actions</th>
 </tr>
 </thead>

 <tbody id="show_data">

 </tbody>
</table>
</div>
</div>
</div>

<div class="modal fade" id="Modal_pdf" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 800px;">





 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>

 </div>


<script type="text/javascript">

$(document).ready(function(){

	var idevento = document.getElementById("filtro").innerHTML;
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('evento/evento_data_participantes')?>', type: 'GET',data:{idevento:idevento}},});

});

$('#show_data').on('click','.item_ver',function(){

var id= $(this).data('idevento');
alert(id); 

});










$('#show_data').on('click','.item_gene',function(){

var iddocumento=0;	
var idtipodocu= $(this).data('idtipodocu');

alert(iddocumento);
var asunto="CERTIFICADO - "+$(this).data('titulo');

let fechaelaboracion=$(this).data('fechafinaliza');
fechaelaboracion=fechaelaboracion.substring(0,10);
var idevento=$(this).data('idevento');
var idordenador=$(this).data('idordenador');
var iddirectorio=$(this).data('iddirectorio');
var iddocumento_estado=1;
var idpersona=$(this).data('idpersona');
var idparticipante=$(this).data('idparticipante');

var iddocumento2=$(this).data('iddocumento2');
var maquina=$(this).data('elordenador');
var elparticipante=$(this).data('elparticipante');
var ruta=$(this).data('ruta');
var archivopdf=$(this).data('archivopdf');
var archivopdf2="";
var filename="";
alert(iddocumento2);


if(iddocumento2==0)
{
   $.ajax({
        url: "<?php echo site_url('documento/save') ?>",
        data: {iddocumento:iddocumento,idtipodocu:idtipodocu,archivopdf:archivopdf,asunto:asunto,fechaelaboracion:fechaelaboracion,idordenador:idordenador,iddirectorio:iddirectorio,iddocumento_estado:iddocumento_estado,idpersona:idpersona},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
	iddocumento=data.iddocumento;
 	archivopdf2= data.archivopdf;	

	//Generando el certificado del participante en un archivo pdf	
	window.location.href = "http://"+maquina+"/FPDI/certificado.php?participante='"+elparticipante+"'&maquina='"+maquina+"'&ruta='"+ruta+"'&modelo='"+archivopdf+"'&archivo='"+archivopdf2+"'";
	// Asignando el documento generado al participante
	  $.ajax({
        	url: "<?php echo site_url('participante/edit') ?>",
		data: {idparticipante:idparticipante,idevento:idevento,iddocumento:iddocumento,idpersona:idpersona},
		method: 'POST',
		async : true,
		dataType : 'json',
		success: function(data){

			//Mostrando el certificado
			var ordenador = "https://"+$(this).data('ordenador');
			if(ordenador.slice(-1) != "/" && ruta.slice(0,1) != "/"){
				ruta = maquina+"/"+ruta;
			}else{
				ruta = maquina+ruta;
			}
			var archivo = archivopdf2;
			var certi= ruta.trim()+archivo.trim();
			window.location.href = certi;

		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }

	    })

	},
      error: function (xhr, ajaxOptions, thrownError){ 
        alert(xhr.status);
        alert(thrownError);
      }

    })

}else{

	let confirmar = confirm("Este certificado ya esta generado ¿Desea verlo?");
	if(confirmar){
		  iddocumento=iddocumento2;
		  $.ajax({
			url: "<?php echo site_url('documento/get_documento') ?>",
			data: {iddocumento:iddocumento},
			method: 'POST',
			async : true,
			dataType : 'json',
			success: function(data){

				
				var maquina1 = "https://"+maquina;

				if(maquina1.slice(-1) != "/" && ruta.slice(0,1) != "/"){
					ruta = maquina1+"/"+ruta;
				}else{
					ruta = maquina1+ruta;
				}
				var archivo = data[0].archivopdf;
				var certi= ruta.trim()+archivo.trim();
				window.location.href = certi;

			},
		      error: function (xhr, ajaxOptions, thrownError) {
			alert(xhr.status);
			alert(thrownError);
		      }

		    })
	}


   }

 



});


</script>



