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
window.location.href = "http://localhost/facae/index.php/evento/actual/"+id;

});


$('#show_data').on('click','.item_gene',function(){

var iddocumento=0;	
var idtipodocu= $(this).data('idtipodocu');


var asunto="CERTIFICADO - "+$(this).data('titulo');



let fechaelaboracion=$(this).data('fechafinaliza');
fechaelaboracion=fechaelaboracion.substring(0,10);
alert(fechaelaboracion);
var idordenador=$(this).data('idordenador');
var iddirectorio=$(this).data('iddirectorio');
var iddocumento_estado=1;
var idpersona=$(this).data('idpersona');

var maquina=$(this).data('elordenador');
var elparticipante=$(this).data('elparticipante');
var ruta=$(this).data('ruta');
var archivopdf=$(this).data('archivopdf');
var archivopdf2="";
var filename="";
var yy="";
yy=maquina+" - "+elparticipante+" - "+maquina+" - "+ruta+" - "+ archivopdf+" - "+archivopdf2;

alert(yy);
   $.ajax({
        url: "<?php echo site_url('documento/save') ?>",
        data: {iddocumento:iddocumento,idtipodocu:idtipodocu,archivopdf:archivopdf,asunto:asunto,fechaelaboracion:fechaelaboracion,idordenador:idordenador,iddirectorio:iddirectorio,iddocumento_estado:iddocumento_estado,idpersona:idpersona},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
	alert("que pasa"+data.archivopdf);
	iddocumento=data.iddocumento;
 	archivopdf2= data.archivopdf;	

 	yy=maquina+" - "+elparticipante+" - "+maquina+" - "+ruta+" - "+ archivopdf+" - "+archivopdf2;

alert(yy);
//window.location.href = "http://localhost/facae/index.php/evento/certificado/"+elparticipante;
window.location.href = "http://"+maquina+"/FPDI/certificado.php?participante='"+elparticipante+"'&maquina='"+maquina+"'&ruta='"+ruta+"'&modelo='"+archivopdf+"'&archivo='"+archivopdf2+"'";




	},
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

});




</script>

