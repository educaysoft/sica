<?php

$this->load->helper('file');


$data0 ='    <style>

.img-contenedor img {
-webkit-transition:all .9s ease; /* Safari y Chrome */
-moz-transition:all .9s ease; /* Firefox */
-o-transition:all .9s ease; /* IE 9 */
-ms-transition:all .9s ease; /* Opera */
width:100%;
}

.img-contenedor:hover img {
-webkit-transform:scale(1.25);
-moz-transform:scale(1.25);
-ms-transform:scale(1.25);
-o-transform:scale(1.25);
transform:scale(1.25);
}

.img-contenedor {/*Ancho y altura son modificables al requerimiento de cada uno*/
/*width:300px;*/
/*height:180px;*/
overflow:hidden;
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

  .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
    
  </head>

 <body>

<header>
  <div class="collapse bg-secondary" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Acerca de Educación Continua</h4>
          <p class="text-light"> Artículo 48:La educación continua hace referencia a procesos de capacitación, actualización y certificación de competencias laborales específicas. Se ejecuta en forma de cursos, seminarios, talleres u otras actividades académicas.</p>

        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contactanos</h4>
          <ul class="list-unstyled">
            <li><a href="https://twitter.com/educaysoft1" class="text-white">Siguenos en Twitter</a></li>
            <li><a href="https://www.facebook.com/stalin.francis.7/" class="text-white">Siguenos en  Facebook</a></li>
            <li><a href="mailto:educaysoft@educaysoft.org" class="text-white">Mensajeame</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-light bg-light shadow-sm" aria-label="Light offcanvas navbar">
    <div class="container">

<a class="navbar-brand" href="https://www.utelvt.edu.ec/site/" target="_blank">
      <img src="https://congresoutlvte.org/images/logoutlvte.png" alt="..." height="45">
    </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<main>
';


$data1='</div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Unidad de Educación Continua UTLVTE fue creado por &copy; EDUCAYSOFT, como parte de un proyecto de desarrollo de software universitario</p>
    <p class="mb-0">Lo nuevo de Educación Continua? <a href="https://educaysoft.org/">Visit the homepage</a> cursos gratis para desarrolladores <a href="https://educaysoft.org/cursos">Cursos gratis</a>.</p>
  </div>
</footer>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"
></script>

<script type="text/javascript">

$(".submenu").click(function(){
  $(this).children("ul").slideToggle();
})

$("ul").click(function(ev){
  ev.stopPropagation();
})

function cargarVideo(url){
        document.getElementById("slider").src=url;
}

</script>
    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
      
  </body>
</html>
                                   
';




$idareaconocimiento=0;
$elperiodoacademico="";
$inicio=1;

foreach($asignaturadocentes as $row){

if($row->idareaconocimiento != $idareaconocimiento and $inicio==0)
{
	 	$data=$data.$data1;
		$file='application/views/cursos/'.$elperiodoacademico.'-'.$idareaconocimiento.'.php';
		if ( !write_file($file, $data)){
		     echo 'Unable to write the file';
		}else{
		    echo $file."\n";
		}
 		$inicio=1;
       }

if($row->idareaconocimiento != $idareaconocimiento and $inicio==1)
	{
	 $idareaconocimiento=$row->idareaconocimiento;
	 $elperiodoacademico=$row->elperiodoacademico;

$data='
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Stalin Francis Quinde">
    <meta name="generator" content="Hugo 0.101.0">
        <meta property="og:site_name" content="Educación Continua-UTLVTE" />
        <meta property="og:image" content="https://educaysoft.org/sica/images/LogoEducacionContinua.png" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="400" />
    <title> '.'Cursos de Educación Continua - UTLVTE - Periodo '.$row->elperiodoacademico.'  Area:'.$row->area . ' </title>

    <link rel="educaysoft" href="https://congresoutlvte.org/faci/">
    
<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" />

';


	 $data=$data.$data0;

$data=$data.'
  <section class="py-5 text-center container">
    <div class="row py-lg-5" style="display:flex;  align-items:center; justify-content: center;" >
<div style=" flex-basis: 40%"  >
<img src="https://repositorioutlvte.org/Repositorio/qr/'.$elperiodoacademico.'-'.$idareaconocimiento.'.png" height="150px">
</div>
      <div >
        <h1 class="fw-light">'.$malla[0]->eldepartamento.'</h1>  
        <p class="lead text-muted">Área:'.$row->area.'.</p>
        <p class="lead text-muted">Periodo:'.$row->elperiodoacademico.'.</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



';





	 $inicio=0;

	}



$data=$data.'<div class="col">
          <div class="card shadow-sm">
		  <a  href="https://educaysoft.org/sica/evento/detalle/'.$row->idevento.'"><svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>';

// Remote file url
$remoteFile = "https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/".trim($row->idareaconocimiento).".jpg";

$file_headers = @get_headers($remoteFile);

// Check if file exists
//if(!file_exists($remoteFile)){

if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
 $data=$data.'<image href="https://repositorioutlvte.org/Repositorio/eventos/sinimagen.png"  height="100%" width="100%"/> </svg></a>

<div class="img-contenedor w3-card-4" style="position:absolute; top:0px;right:0px; border: 2px solid green; border-radius: 50%; width: 30%; display:flex; justify-content: center; align-items: center;">';

}else{

$data=$data.'<image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/'.trim($row->idareaconocimiento).'.jpg" height="100%" width="100%"/> </svg></a>

<div class="img-contenedor w3-card-4" style="position:absolute; top:0px;right:0px; border: 2px solid green; border-radius: 50%; width: 30%; display:flex; justify-content: center; align-items: center;">';




}


// Remote file url
$remoteFile = "https://repositorioutlvte.org/Repositorio/fotos/".trim($row->cedula).".jpg";

$file_headers = @get_headers($remoteFile);

// Check if file exists
//if(!file_exists($remoteFile)){
if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
  //  echo 'File not found';
	$data=$data.'<img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100%" height="100%" style="border-radius:50px;">';

}else{
	$data=$data.'<img src="https://repositorioutlvte.org/Repositorio/fotos/'.trim($row->cedula).'.jpg" width="100%" height="100%" style="border-radius:50px;">';


}

$data=$data.'</div>

            <div class="card-body">
              <b>Area:</b>'.$row->area.'.<br>
              <b>Nivel:</b>'.$row->nivel.'.<br>
              <p><b>Asignatura : </b>'.$row->laasignatura.'.</p>
              <p class="card-text"><b>Paralelo : </b> '.$row->paralelo.'".</p>
              <p><b>Docente : </b><span style="color:blue">'.$row->eldocente.'.</span></p>

              <p><b>Inicia : </b><span style="color:red">'.$row->fechainicia.'.</span><br>
	      <b>Finaliza : </b><span style="color:red">'.$row->fechafinaliza.'.</span></p>';



		foreach($jornadadocente[$row->iddistributivodocente] as $rowj){
//			if($row->iddistributivodocente==221){		
			print_r(rowj);
			$data=$data.'<b>'.$rowj['nombre'] .': </b><span style="color:red">'.$rowj['horainicio'].'('.$rowj['duracionminutos'].') - aula:'.$rowj['elaula'].'</span><br>';
//			}
		}
die();
	if(strpos($row->estadoevento,"TERMINADO")!==false || strpos($row->estadoevento,"PRÓXIMO A INICIAR")!==false  ){
		$data=$data.' <p><b>ESTADO : </b><span style="color:red">'.$row->estadoevento.'.</span></p>';
	}else{
		$data=$data.' <p><b>ESTADO : </b><span style="color:green">'.$row->estadoevento.'.</span></p>';
	}
              	$data=$data.'<div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href=\'https://educaysoft.org/sica/login/validarcorreo?idevento='.$row->idevento.'\'"  >Inscribete</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.href=\'https://educaysoft.org/sica/login\'">Ingresa</button>
                </div>
                <small class="text-muted"><b>Modalidad:</b>Presencial</small>

              </div>
            </div>
          </div>
        </div>
';


}


$data=$data.$data1;

	$file='application/views/cursos/'.$elperiodoacademico.'-'.$idareaconocimiento.'.php';
	if ( !write_file($file, $data)){
	     echo 'Unable to write the file';
	}else{
	    echo $file."\n";
	}



echo "archivo generado";
die();

?>

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
                 <h3>Lista de distributivodocentes 
                 <!-- <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>-->
			  
        	</h3>
       	     </div>




	<div id="eys-nav-i">
	<ul>
    		<li> <?php echo anchor('distributivodocente', 'Home'); ?></li>
	</ul>
       	</div>
<br>
<table class="table table-striped table-bordered table-hover" id="mydatac">
 <thead>
 <tr>
 <th>ID</th>
 <th>distributivodocente</th>
 <th>Asignaturas</th>
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
	var mytabla= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('distributivodocente/distributivodocente_data')?>', type: 'GET'},});

});

$('#show_data').on('click','.item_ver',function(){
	var id= $(this).data('iddistributivodocente');
	var retorno= $(this).data('retorno');
	window.location.href = retorno+'/'+id;
});


</script>

