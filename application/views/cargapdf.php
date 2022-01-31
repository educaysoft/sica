<script type='text/javascript'>
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


        function fdocumento(docu){
alert(docu);
          //  var result = checkFileExist(docu);
 // var result = checkFileExist("http://localhost/test/anyDirectoryName/");
    //        if (result == true) {

            document.getElementById("p1").setAttribute('style',"height: 800px;");
            document.getElementById("p1").innerHTML = "<div class='w3-card-2' style='height:100%; position:relative;'><header class='w3-containar w3-red' style='padding:5px; display:inline-block; width:100%;' ><form action='loadpdf' method='post' enctype='multipart/form-data'><div style='float:left'><input class='w3-button w3-blue' style='font-size:60%'  type='file' name='fileToUpload' id='fileToUpload'></div><div style='float:right; font-size:60%;'><input class='w3-button w3-blue' type='submit' value='Guardar el pdf' name='submit'></div></form></header><div id='elpdf' style='margin-top:0; overflow-y:auto;'>Subir archivo </div> <footer class=' w3-blue' style='position:absolute; bottom:0; left:0; width:100%;'></footer></div>";
   // alert('yay, file exists!');
      //      } else {
   // alert('file does not exist!');
        //    }

	          mostrar1(docu);
        }

        function fprueba() {
	          document.getElementById("p1").setAttribute('style',"height: 300px;");
	          document.getElementById("p1").innerHTML = "<div class='w3-card-2' style='height:100%; position:relative;'><header class='w3-containar w3-blue' style='padding:10px'><p>Prueba de conocimiento</p></header> <div style='padding:10px; text-align:justify;'>Despues de revisar los documentos y comprobar que cumplen con lo requerimiento se habilitara el acceso para que puede cumplir con la segunda etapa que corresponde a la Prueba de conocimiento.<br><button>Acede a la Prueba</button> </div> <footer class='w3-blue' style='position:absolute; bottom:0; left:0; width:100%;'> Espera a que esta habilitado </footer></div>";
            //$( this ).replaceWith( "<div>" + $( this ).text() + "</div>" );
        }

        function fentrevista() {
	          document.getElementById("p1").setAttribute('style',"height: 300px;");
	          document.getElementById("p1").innerHTML = "<div class='w3-card-2' style='height:100%; position:relative;'><header class='w3-containar w3-blue' style='padding:10px'><p>Entrevista realizada</p></header> <div>Después de rendir y aprobar la prueba de conocimiento se le enviara un link para realizar una entrevista y conocier sus espectativas sobre la maestría.<br> <button>Acceso a la videollamada</button> </div> <footer class='w3-blue' style='position:absolute; bottom:0; left:0; width:100%;'> Esperar a que este habilitado </footer></div>";
            //$( this ).replaceWith( "<div>" + $( this ).text() + "</div>" );
        }
        function fmatricula() {
	          document.getElementById("p1").setAttribute('style',"height: 300px;");
	          document.getElementById("p1").innerHTML = "<div class='w3-card-2' style='height:100%; position:relative;'><header class='w3-containar w3-blue' style='padding:10px'><p>Pago del valor de la matrícula</p></header> <div> Despues de haber cumplidos con los requisitos procesa a cancelar el valor de la matrícula para empezar su proceso de formación</div> <footer class='w3-blue' style='position:absolute; bottom:0; left:0; width:100%;'> Espere a que se habilite el boton para subir su comprobante de pago </footer></div>";
            //$( this ).replaceWith( "<div>" + $( this ).text() + "</div>" );
        }


    async function cargaview(){
        var txt="<div id='pdf-main-container' style='position:relative;'><div id='pdf-loader'>Loading document ...</div><div id='pdf-contents'><div id='pdf-meta'>	<div id='pdf-buttons'><button onClick='previo()' id='pdf-prev'>Previous</button><button onClick='nex()' id='pdf-next'>Next</button></div><div id='page-count-container' >Page <div id='pdf-current-page'></div> of <div id='pdf-total-pages'></div></div></div><canvas id='pdf-canvas' width='400'></canvas><div id='page-loader'>Loading page ...</div></div></div>";

	      document.getElementById("elpdf").innerHTML = txt;
     //   document.getElementById("pdf-main-container").innerHTML= "HOLA HOLA";
      //  document.getElementById("pdf-contents").innerHTML= "HOLA-- HOLA";
        }

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
	cargaview();
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




<div class="w3-container" style=" margin-top:2.5cm; width:100%; padding:10px; display:inline-block; vertical-align:top; margin-right:1em;">
        


    <div id="p1" class="eys-contenido-blog" >
        <div id="blog_text">
            <?php echo $blog_text;?>
        </div>
        <center>
            <a href="#"><img src="<?php echo base_url(); ?>images/postulacion.jpg" width="400" height="400" alt=""> </a>
        </center> 
    </div>

//<?php echo base_url().$this->session->userdata['logged_in']['pdf']; ?>
<?php echo  '<script type="text/javascript">  fdocumento("'.$documento['ruta'].$documento['archivopdf'].'");</script>';?>
</div>
