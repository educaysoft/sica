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
		<li> <?php echo anchor('documento', 'Home'); ?></li>
	</ul>
</div>

<br>

<div class="row justify-content-center">
      <!-- Page Heading -->


 <div class="row">
  <div class="col-12">



	<div class="form-group row">
    	<label class="col-md-2 col-form-label"> Tipo documento:</label>
	<?php
		$options= array('--Select--');
		foreach ($tipodocus as $row){
			$options[$row->idtipodocu]= $row->descripcion;
		}
	?>

	<div class="col-md-10">
		<?php
     			echo form_dropdown("idtipodocu",$options, set_select('--Select--','default_value'),array('onchange'=>'filtra_documento()'));  
		?>
	</div>
	</div>




<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>ID</th>
<th>Tipo</th>
 <th>Elaboracion</th>
 <th>Autor</th>
 <th>asunto/titulo</th>
 <th>archivopdf</th>
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










<form>
	<div class="modal fade" id="Modal_Edit" tabindex="-1"  role="dialog" arias-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Existencia en portafolio</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="form-group row">
						<label class="col-md-2 col-form-label">iddocumentoportafolio</label>
						<div class="col-md-10">
							<input type="text" name="iddocumentoportafolio_edit" id="iddocumentoportafolio_edit" class="form-control" placeholder="iddocumentoportafolio">  
						</div>
					</div>					


					<div class="form-group row">
					<label class="col-md-2 col-form-label"> Portafolio:</label>
					<div class="col-md-10">
					<?php

                    $options= array('--Select--');
                    foreach ($portafolios as $row){
                        $options[$row->idportafolio]=$row->idportafolio." - ". $row->lapersona." - ".$row->elperiodo;
                    }


                    echo form_dropdown("idportafolio_edit",$options, set_select('--Select--','default_value'),array('id'=>'idportafolio_edit')); 
					?>
					</div>
					</div>

                    <div class="form-group row">
					<label class="col-md-2 col-form-label"> Documento:</label>
					<div class="col-md-10">
					<?php

                    $options= array('--Select--');
                    foreach ($documentos as $row){
                        $options[$row->iddocumento]=$row->iddocumento.' - '.$row->autor." - ". $row->asunto;
                    }

                     echo form_dropdown("iddocumento_edit",$options, set_select('--Select--','default_value'),array('id'=>'iddocumento_edit'));  


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



















<!--
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" />
 <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
-->
<script type="text/javascript">

   var _PDF_DOC,
        _CURRENT_PAGE,
        _TOTAL_PAGES,
        _PAGE_RENDERING_IN_PROGRESS = 0,
        _CANVAS;


        function checkFileExist(urlToFile) {
            var xhr = new XMLHttpRequest();
            xhr.open('HEAD', urlToFile, false);
            xhr.send();
     
            if (xhr.status == "404") {
                    return false;
            } else {
                    return true;
            }
        }


var idtipodocu=0;
function filtra_documento()
{
	idtipodocu = $('select[name=idtipodocu]').val();
	var mytabla= $('#mydatac').DataTable({destroy: true,"ajax": {url: '<?php echo site_url('documento/documento_dataxtipodocu')?>', type: 'GET',data:{idtipodocu:idtipodocu}},});
}


$(document).ready(function(){

var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('documento/documento_data')?>', type: 'GET',data:{idtipodocu:idtipodocu}},});
//	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('documento/documento_data')?>', type: 'GET'},});


$('#show_data').on('click','.docu_ver',function(){


var ordenador = "https://"+$(this).data('ordenador');
var ubicacion = $(this).data('ubicacion');
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archivo = $(this).data('archivo');
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;

});







$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddocumento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;

});


$('#show_data').on('click','.item_doc',function(){
var id= $(this).data('iddocumento');
var retorno= $(this).data('retorno2');
window.location.href = retorno+'/'+id;
});


$('#show_data').on('click','.item_folio',function(){
var iddocumento= $(this).data('iddocumento');
var idpersona= $(this).data('idpersona');
get_portafolio(iddocumento,idpersona);
//var retorno= $(this).data('retorno');
//window.location.href = retorno+'/'+id;

});






/*

	 $('#show_data').on('click','.item_pdf',function(){
		 var iddocumento = $(this).data('iddocumento');
		 var archivopdf =  $(this).data('archivopdf');
		alert(archivopdf);
		 $('#Modal_pdf').modal('show');


           document.getElementById("Modal_pdf").setAttribute('style',"height: 800px;");
            document.getElementById("Modal_pdf").innerHTML ="<div id='pdf-main-container' style='position:relative;'><div id='pdf-loader'>Loading document ...</div><div id='pdf-contents'><div id='pdf-meta'>	<div id='pdf-buttons'><button onClick='previo()' id='pdf-prev'>Previous</button><button onClick='nex()' id='pdf-next'>Next</button></div><div id='page-count-container' >Page <div id='pdf-current-page'></div> of <div id='pdf-total-pages'></div></div></div><canvas id='pdf-canvas' width='400'></canvas><div id='page-loader'>Loading page ...</div></div></div>";


 
	          mostrar1(archivopdf);


		return false;
	 });
*/
});


// initialize and load the PDF
    async function showPDF(pdf_url) {
        document.querySelector("#pdf-loader").style.display = 'block';
alert(pdf_url);
    // get handle of pdf document
    try {
        _PDF_DOC = await pdfjsLib.getDocument({ url: pdf_url });
    }
    catch(error) {
        alert(error.message);
    }

    // total pages in pdf
    _TOTAL_PAGES = _PDF_DOC.numPages;
    
    // Hide the pdf loader and show pdf container
    document.querySelector("#pdf-loader").style.display = 'none';
    document.querySelector("#pdf-contents").style.display = 'block';
    document.querySelector("#pdf-total-pages").innerHTML = _TOTAL_PAGES;

    // show the first page
    showPage(1);
}

// load and render specific page of the PDF
async function showPage(page_no) {
    _PAGE_RENDERING_IN_PROGRESS = 1;
    _CURRENT_PAGE = page_no;

    // disable Previous & Next buttons while page is being loaded
    document.querySelector("#pdf-next").disabled = true;
    document.querySelector("#pdf-prev").disabled = true;

    // while page is being rendered hide the canvas and show a loading message
    document.querySelector("#pdf-canvas").style.display = 'none';
    document.querySelector("#page-loader").style.display = 'block';

    // update current page
    document.querySelector("#pdf-current-page").innerHTML = page_no;
    
    // get handle of page
    try {
        var page = await _PDF_DOC.getPage(page_no);
    }
    catch(error) {
        alert(error.message);
    }

    // original width of the pdf page at scale 1
    var pdf_original_width = page.getViewport(1).width;
    
    // as the canvas is of a fixed width we need to adjust the scale of the viewport where page is rendered
    var scale_required = _CANVAS.width / pdf_original_width;

    // get viewport to render the page at required scale
    var viewport = page.getViewport(scale_required);

    // set canvas height same as viewport height
    _CANVAS.height = viewport.height

    // setting page loader height for smooth experience
    document.querySelector("#page-loader").style.height =  _CANVAS.height + 'px';
    document.querySelector("#page-loader").style.lineHeight = _CANVAS.height + 'px';

    // page is rendered on <canvas> element
    var render_context = {
        canvasContext: _CANVAS.getContext('2d'),
        viewport: viewport
    };
        
    // render the page contents in the canvas
    try {
        await page.render(render_context);
    }
    catch(error) {
        alert(error.message);
    }

    _PAGE_RENDERING_IN_PROGRESS = 0;

    // re-enable Previous & Next buttons
    document.querySelector("#pdf-next").disabled = false;
    document.querySelector("#pdf-prev").disabled = false;

    // show the canvas and hide the page loader
    document.querySelector("#pdf-canvas").style.display = 'block';
    document.querySelector("#page-loader").style.display = 'none';
}


function mostrar1(elpdf){
//	cargaview();
    _CANVAS = document.querySelector('#pdf-canvas');


 //  document.querySelector("#show-pdf-button").style.display = 'none';

   showPDF(elpdf);
   //showPDF('https://mozilla.github.io/pdf.js/web/compressed.tracemonkey-pldi-09.pdf');
}

function previo(){
   if(_CURRENT_PAGE != 1)
        showPage(--_CURRENT_PAGE);

}

function nex(){

    if(_CURRENT_PAGE != _TOTAL_PAGES)
        showPage(++_CURRENT_PAGE);

}



function get_portafolio(iddocumento,idpersona) {
//	var idpersona=document.getElementById("idpersona").value;
	idpersona=parseInt(idpersona);
	iddocumento=parseInt(iddocumento);
    $.ajax({
        url: "<?php echo site_url('portafolio/get_portafolio') ?>",
        data: {iddocumento:iddocumento,idpersona:idpersona},
        method: 'GET',
        async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
	    var comentario="";
        var i;
	$('#Modal_Edit').modal('show');
        if(data.length==0){

              //    alert("no encotro ");
          $('[name="iddocumentoportafolio_edit"]').val(0);
          $('[name="iddocumento_edit"]').val(iddocumento);
          $('[name="idportafolio_edit"]').val(0);
        }else{
            if(data[0].iddocumentoportafolio){
               //   alert("lo encontro en documentoportafolio");
                  $('[name="iddocumentoportafolio_edit"]').val(data[0].iddocumentoportafolio);
                  $('[name="iddocumento_edit"]').val(data[0].iddocumento);
                    $('[name="idportafolio_edit"]').val(data[0].idportafolio);
            }else{
                //  alert("lo encontro en portafolio "+data[0].idportafolio);
                  $('[name="iddocumentoportafolio_edit"]').val(0);
                  $('[name="iddocumento_edit"]').val(iddocumento);
                  $('[name="idportafolio_edit"]').val(data[0].idportafolio);

            }
        }
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}

//function save_documentoportafolio() {
$("#btn_update").on("click", function(){


	var p = document.getElementById("idportafolio_edit");
  	var arrtmp=p.options[p.selectedIndex].text;
	const x=arrtmp.split(" - ");
	var idportafolio=x[0];
    
    var d = document.getElementById("iddocumento_edit");
  	var arrtmp=d.options[d.selectedIndex].text;
	const y=arrtmp.split(" - ");
	var iddocumento=y[0];

    var iddocenteactividadacademica=0;
    var minutosocupados=0;

   // alert(idportafolio+'  -  '+iddocumento);    
   // alert(iddocenteactividadacademica+" - "+minutosocupados);

    $.ajax({
        url: "<?php echo site_url('documentoportafolio/save2') ?>",
        data: {iddocumento:iddocumento,idportafolio:idportafolio,iddocenteactividadacademica:iddocenteactividadacademica,minutosocupados:minutosocupados},
        method: 'POST',
        async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
	    var comentario="";
        var i;
     //   alert(data);
	$("#Modal_Edit").modal("hide"); 

    idtipodocu=0;
var mytabla= $('#mydatac').DataTable({destroy:true,"ajax": {url: '<?php echo site_url('documento/documento_data')?>', type: 'GET',data:{idtipodocu:idtipodocu}},});

	},
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    });
    return false;

});






</script>

