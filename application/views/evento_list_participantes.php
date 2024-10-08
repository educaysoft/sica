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


<div id="eys-nav-i">
	<ul>
		<li> <?php echo anchor('evento/actual/'.$this->uri->segment(3), 'Home'); ?></li>
	</ul>
</div>

<br>

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
 <th>docume</th>
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

        var archivo="";
	var iddocumento= $(this).data('iddocumento2');
      $.ajax({
        url: "<?php echo site_url('documento/get_documento') ?>",
	  method: 'POST',
	  data: {iddocumento:iddocumento},
	  async : false,
          dataType : 'json',
	  success: function(data) {
		   archivo= data[0].archivopdf;  
	},
      error: function (xhr, ajaxOptions, thrownError){ 
        alert(xhr.status);
        alert(thrownError);
      }
	});
	if(archivo != ''){
 		var ordenador = "https://"+$(this).data('ordenador');
		var ubicacion=$(this).data('ruta');
		if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
			ubicacion = ordenador+"/"+ubicacion;
		}else{
			ubicacion = ordenador+ubicacion;
		}
		var certi= ubicacion.trim()+archivo.trim();
		window.location.href = certi;
	}else{
		alert("No se encontra el archivo");
	}

});




$('#show_data').on('click','.item_enviar',function(){
        var archivo="";
	var iddocumento= $(this).data('iddocumento2');
      $.ajax({
        url: "<?php echo site_url('documento/get_documento') ?>",
	  method: 'POST',
	  data: {iddocumento:iddocumento},
	  async : false,
          dataType : 'json',
	  success: function(data) {
		   archivo= data[0].archivopdf;  
	},
      	error: function (xhr, ajaxOptions, thrownError){ 
        	alert(xhr.status);
        	alert(thrownError);
      	}
	});


        var correopara="";
	var idpersona= $(this).data('idpersona');

      $.ajax({
        url: "<?php echo site_url('persona/get_persona') ?>",
	  method: 'POST',
	  data: {idpersona:idpersona},
	  async : false,
          dataType : 'json',
	  success: function(data) {
		   correopara= data[0].correo;  
	},
      	error: function (xhr, ajaxOptions, thrownError){ 
        	alert(xhr.status);
        	alert(thrownError);
      	}
	});


	if(archivo != ''){
 		var ordenador = "https://"+$(this).data('ordenador');
		var ubicacion=$(this).data('ruta');
		if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
			ubicacion = ordenador+"/"+ubicacion;
		}else{
			ubicacion = ordenador+ubicacion;
		}
		var certi= ubicacion.trim()+archivo.trim();
	
	
		 var email="maestria.ti@utelvt.edu.ec";
		 var nome="Ing. Stalin Francis"; 		
                 var msg="<div style='text-align:center; border-radius:25px; border:2px solid #73AD21; padding:10px; height:100px;'>"+ $(this).data('elparticipante')+",  Gracias por participar en el evento, su certificado ya esta diponible en el siguiente link.<br> <span sytle='font-size:30px;'><a href='"+certi+"'>certificado</a></spane></div>" ;
		 var mailto= "stalin.francis@utelvt.edu.ec";
		 var secure="siteform";
		 var idpersona=$(this).data('idpersona');
		 var asunto=$(this).data('correosubject'); //'UTLVTE - VINCULACION MANTENIMIENTO DE LABORATORIO DE COMPUTACIÓN'; //'ARMADA DEL ECUADOR - UTLVTE : CERTIFICACIÓN DIGITAL';

		 var head=$(this).data('correohead');  ""; // "<div> <b>Las Jornadas virtuales de fortalecimiento de la EGB y BGU de Esmeraldas en propuestas educativas vinculadas a los intereses marítimos</b>, ha sido organizado por la Armada del Ecuador con el apoyo técnico de la Universidad Técnica Luis Vargas Torres de Esmeraldas, gracias al convenio marco que tienen estas dos instituciones. <br><br>  Este correo le ha sido entregado después de haber terminado de forma satisfactoria la capacitación sobre temas marítimos, lo que lo hace merecedor/a a una certificación que reposará de forma segura en los servidores de la Universidad y que puede descargar accediendo al siguiente link</div>";
			
		var foot0=$(this).data('correofoot'); //"<div style='text-align:center; background-color:lightgrey; padding:10px;'> Aprovechamos la oportunidad para informarte que la Universidad Técnica Luis Vargas Torres esta ofertando los siguientes programas de postgrado.<br><br> <img src='http://educaysoft.org/maestria/maestriasutlvte.jpg' width='100%' height='100%'></div>" ;
		 var foot=" <div style='text-align:center; background-color:lightgrey; font-size:12px; padding-top:30px;'> Este correo ha sido enviado a "+mailto+ ", de acuerdo a la Ley Orgánica de Protección de datos, usted tiene el derecho a solicitar a la Universidad Técnica Luis Vargas Torres, la actualización, inclusión, supresión y/o tratamiento de los datos personales incluidos en sus bases de datos, con este correo electrónico usted acepta recibir información de las actividades académicas que realiza el Alma Mater así como nuestra propuestas académicas <br><br> Este correo fue generado y enviado automáticamente desde el sistema cloud elaborado de la Maestría en Tecnología de la Información</div> ";

		msg=head+msg+foot0+foot;

		var correode="educacioncontinua@utelvt.edu.ec";
		if(correopara==''){
			correopara=mailto;
		}

	    $.ajax({
		url: "<?php echo site_url('seguimiento/send') ?>",
		data: {nome:nome, correopara:correopara, msg:msg, correode:correode, secure:secure, asunto:asunto, idpersona:idpersona},
		method: 'POST',
		async : false,
		success: function(data){
		var html = '';
		var i;
		alert(data);


		},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    
	});

	}else{
		alert("No se encontra el archivo");
	}
});








$('#show_data').on('click','.item_gene',function(){

	var iddocumento=0;	
	var idtipodocu= $(this).data('idtipodocu');

	//alert(iddocumento);
	var asunto="CERTIFICADO - "+$(this).data('titulo');

	let fechaelaboracion=$(this).data('fechafinaliza');
	fechaelaboracion=fechaelaboracion.substring(0,10);
	var idevento=$(this).data('idevento');
var idordenador=$(this).data('idordenador');
var iddirectorio=$(this).data('iddirectorio');
var iddocumento_estado=3;
var idpersona=$(this).data('idpersona');
var idparticipante=$(this).data('idparticipante');


var ancho_x=$(this).data('ancho_x');
var alto_y=$(this).data('alto_y');



var posi_nomb_x=$(this).data('posi_nomb_x');
var posi_nomb_y=$(this).data('posi_nomb_y');
var size_nombre=$(this).data('size_nombre');

var posi_codigo_x=$(this).data('posi_codigo_x');
var posi_codigo_y=$(this).data('posi_codigo_y');

var posi_fecha_x=$(this).data('posi_fecha_x');
var posi_fecha_y=$(this).data('posi_fecha_y');


var firma1_x=$(this).data('firma1_x');
var firma1_y=$(this).data('firma1_y');


var firma2_x=$(this).data('firma2_x');
var firma2_y=$(this).data('firma2_y');


var firma3_x=$(this).data('firma3_x');
var firma3_y=$(this).data('firma3_y');


var texto1=$(this).data('texto1');
var descripcion=$(this).data('texto1');
var posi_texto1_x=$(this).data('posi_texto1_x');
var posi_texto1_y=$(this).data('posi_texto1_y');
var ancho_texto1=$(this).data('ancho_texto1');
var alto_texto1=$(this).data('alto_texto1');
var font_size_texto1=$(this).data('font_size_texto1');


var iddocumento2=$(this).data('iddocumento2');
var maquina=$(this).data('elordenador');
var elparticipante=$(this).data('elparticipante');
var ruta=$(this).data('ruta');
var archivopdf=$(this).data('archivopdf');
var archivopdf2="";
var filename="";


if(iddocumento2==0)
{
//	let confirmar = confirm("Este certificado no se ha generado ¿Quiere generar?");
//	if(confirmar){
   $.ajax({
        url: "<?php echo site_url('documento/save') ?>",
        data: {iddocumento:iddocumento,idtipodocu:idtipodocu,archivopdf:archivopdf,asunto:asunto,descripcion:descripcion,fechaelaboracion:fechaelaboracion,idordenador:idordenador,iddirectorio:iddirectorio,iddocumento_estado:iddocumento_estado,idpersona:idpersona},
        method: 'POST',
	async : false,
        dataType : 'json',
        success: function(data){
	iddocumento=data.iddocumento;
	iddocumento2=data.iddocumento;
 	archivopdf2= data.archivopdf;	
	if(iddocumento>0){

//	alert("Generando el certificado del participante en un archivo pdf");	
	
  	var formData = new FormData();
	var participante=elparticipante;
	
	
	formData.append("descripcion", descripcion);
	formData.append("elparticipante", participante);
    	formData.append("archivopdf", archivopdf);
    	formData.append("archivopdf2", archivopdf2);
    	formData.append("maquina", maquina);
    	formData.append("ruta", ruta);

    	formData.append("ancho_x", ancho_x);
    	formData.append("alto_y", alto_y);

    	formData.append("posi_nomb_x", posi_nomb_x);
    	formData.append("posi_nomb_y", posi_nomb_y);
    	formData.append("size_nombre", size_nombre);

    	formData.append("posi_codigo_x", posi_codigo_x);
    	formData.append("posi_codigo_y", posi_codigo_y);

    	formData.append("posi_fecha_x", posi_fecha_x);
    	formData.append("posi_fecha_y", posi_fecha_y);

    	formData.append("firma1_x", firma1_x);
    	formData.append("firma1_y", firma1_y);

    	formData.append("firma2_x", firma2_x);
    	formData.append("firma2_y", firma2_y);

    	formData.append("firma3_x", firma3_x);
    	formData.append("firma3_y", firma3_y);

	
    	formData.append("texto1", texto1);
    	formData.append("posi_texto1_x", posi_texto1_x);
    	formData.append("posi_texto1_y", posi_texto1_y);
    	formData.append("ancho_texto1", ancho_texto1);
    	formData.append("alto_texto1", alto_texto1);
    	formData.append("font_size_texto1", font_size_texto1);

    	formData.append("fechafinaliza", fechaelaboracion);

	console.log(formData);
	url= "https://"+maquina+"/FPDI/certificado.php";
	var xhttp = new XMLHttpRequest();
	xhttp.open("POST",url);
    	xhttp.send(formData);
	xhttp.onreadystatechange = function(){

 		if(xhttp.readyState === XMLHttpRequest.DONE) {
    			var status = xhttp.status;
    			if (status === 0 || (status >= 200 && status < 400)) {
      				// The request has been completed successfully
				var response = xhttp.responseText;
          			alert(response + "archivo cargado");
			//	history.back(); //Go to the previous page
       			}else{
				alert("No se pudo cargar el archivo");
			}
			}else{ alert("que paso chico");}
              	};
    		// Send request with data


	// Asignando el documento generado al participante
	}
	},
      error: function (xhr, ajaxOptions, thrownError){ 
        alert(xhr.status);
        alert(thrownError);
      }

    })


	if(iddocumento2>0)
	{
//		alert("asignado el documento a participante");
	  $.ajax({
        	url: "<?php echo site_url('participante/save_edit2') ?>",
		data: {idparticipante:idparticipante,idevento:idevento,iddocumento:iddocumento,idpersona:idpersona},
		method: 'POST',
		async : false,
		dataType : 'json',
		success: function(data){

				var maquina1 = "https://"+maquina;

				if(maquina1.slice(-1) != "/" && ruta.slice(0,1) != "/"){
					ruta = maquina1+"/"+ruta;
				}else{
					ruta = maquina1+ruta;
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
	}

	//}
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



