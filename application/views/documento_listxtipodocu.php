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

<div class="form-group row">
    	<label class="col-md-2 col-form-label"> Tipo  documento:</label>
	<?php
		$options= array('--Select--');
		foreach ($tipodocus as $row){
			$options[$row->idtipodocu]= $row->descripcion;
		}
	?>

	<div class="col-md-10">
		<?php
     			echo form_dropdown("idtipodocu",$options[$filtro], set_select('--Select--','default_value'),array('onchange'=>'filtra_documento()'));  
		?>
	</div>
	</div>






	     
<div id="filtro"><?php echo $filtro; ?></div>
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




$(document).ready(function(){

	var idtipodocu = document.getElementById("filtro").innerHTML;
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('documento/documento_dataxtipodocu')?>', type: 'GET',data:{idtipodocu:idtipodocu}},});


$('#show_data').on('click','.docu_ver',function(){

var ordenador = "https://"+$(this).data('ordenador');
var ubicacion=$(this).data('ubicacion');
if(ordenador.slice(-1) != "/" && ubicacion.slice(0,1) != "/"){
        ubicacion = ordenador+"/"+ubicacion;
}else{
	ubicacion = ordenador+ubicacion;
}
var archivo = $(this).data('archivo');
var certi= ubicacion.trim()+archivo.trim();
window.location.href = certi;
});





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








</script>

