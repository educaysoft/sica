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
   



contenedor {
  position: relative;
  width: 600px;
  height: 400px;
  background-color: #f0f0f0;
  margin: 50px auto;
  padding: 20px;
}

.texto-transversal {
  top: 50%;
  left: 50%;
  transform: translate(0%, 0%) rotate(-0deg);
  background-color: rgba(0, 0, 0, 0.7);
  padding: 20px;
  color: white;
  box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
}

.texto-transversal h2 {
  margin: 0;
  padding: 0;
  font-size: 24px;
  text-transform: uppercase;
}

.texto-transversal p {
  margin: 0;
  padding: 0;
  font-size: 18px;
}



/* para la tabla de distributivo individual */

/* Estilos de la tabla */
.tabla-container {
  width: 100%;
  overflow-x: auto; /* Permitir desplazamiento horizontal en pantallas pequeñas */
}

table {
  width: 100%;
  border-collapse: collapse;
}

table th, table td {
  padding: 8px;
  border: 1px solid #ddd;
  text-align: left;
}

/* Estilos de la tabla - Alternar colores de fila */
/*table tbody tr:nth-child(even) {
  background-color: #fdcaca;
} */

/* Estilos de la tabla - Cabecera */
table th {
  background-color: #4CAF50;
  color: white;
}

table tr:last-child {
	color: #fff;
	background-color: #000;
}

.docencia {
  background-color: lightgreen;
}
.investigacion {
  background-color: yellow;
}
.vinculacion {
  background-color: salmon;
}

.gestion {
  background-color: lightblue;
}




/* Estilos de la tabla - Responsive */
@media screen and (max-width: 600px) {
  table {
    border: 0;
  }
  table thead {
    display: none;
  }
  table tr {
    border-bottom: 2px solid #ddd;
    display: block;
    margin-bottom: 20px;
  }
  table td {
    border-bottom: none;
    display: block;
    text-align: right;
  }
  table td::before {
    content: attr(data-label);
    float: left;
    font-weight: bold;
  }
}



/* para los mensaje popup */

.containerm {
    position: relative;
    width: 300px; /* ajusta el ancho según sea necesario */
    margin: 0 auto;
    padding-top: 50px; /* espacio para el mensaje emergente */
}



   
.texto {

font-size: 16px;
    line-height: 1.6;

}

.popup {
 display: none;
    position: fixed;
    background-color: #ffcc00; /* color de fondo del mensaje */
    color: #333; /* color de texto del mensaje */
    padding: 10px; /* ajusta el relleno según sea necesario */
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2); /* sombra del mensaje */
    z-index: 9999; /* asegura que el mensaje esté sobre otros elementos */ 


}





 </style>
    
  </head>

 <body>


<header>
  <div class="collapse bg-secondary" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white"> <a href="https://repositorioutlvte.org/Repositorio/eventos/2023-11-29.jpeg" class="text-white">Acerca del Proyecto de Aula de Ingenieria de Software</a></h4>
          <p class="text-light"> El proyecto de aula en Ingeniería de Software  implico la planificación, desarrollo y evaluación colaborativa de soluciones informáticas, fomentando el trabajo en equipo, la resolución de problemas y la aplicación práctica de conceptos técnicos. .</p>

        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contactanos</h4>
          <ul class="list-unstyled">
            <li><a href="https://educaysoft.org/sica/evento/participantes/356" class="text-white">5to-A Ingenieria de Software I</a></li>
            <li><a href="https://educaysoft.org/sica/evento/participantes/357" class="text-white">5to-B Ingenieria de Softare I</a></li>
            <li><a href="https://educaysoft.org/sica/evento/participantes/350" class="text-white">4to-B Base de Datos I</a></li>
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
     <p class="mb-1">Este sitio web que presenta <xxxx> horas clases docencia, es parte del producto del <b>PROYECTO DE AULA</b> titulado <a href="https://repositorioutlvte.org/Repositorio/2024-01-15-FQSA-01627.pdf"> <b> "Diseño y Desarrollo de una plataforma web para la Gestión de la información Académica"</b></a> </p>
    <p class="mb-0">El proyecto fue realizado con la participación de <a href="https://educaysoft.org/sica/evento/participantes/350"> 4-B Base de Datos I</a> ,<a href="https://educaysoft.org/sica/evento/participantes/356"> 5to-A</a> y <a href="https://educaysoft.org/sica/evento/participantes/357">5to-B</a>  Ingenieria de Software I en el periodo 2023-1S, cuyo tutor fue el Ing. Stalin Francis Msc., Docente de las Asignaturas.</p>
  </div>
</footer>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.js"
></script>

<script type="text/javascript">



document.addEventListener("DOMContentLoaded", function() {
    const textos = document.querySelectorAll(".texto");
  var tablas = document.querySelectorAll(".miTabla");

//color a fila de tabla
 tablas.forEach(function(tabla) {
    var filas = tabla.getElementsByTagName("tr");

    for (var i = 0; i < filas.length; i++) {
      var celda = filas[i].querySelector(".tipo");

      if (celda) {
	var tipo = celda.textContent.trim();   // parseInt(celda.textContent || celda.innerText);

        if (tipo == "Docencia") {
          filas[i].classList.add("docencia");
        } else if (tipo == "Investigación") {
          filas[i].classList.add("investigacion");
        } else if (tipo == "Vinculación") {
          filas[i].classList.add("vinculacion");
        } else if (tipo == "Gestión") {
          filas[i].classList.add("gestion");
        } else {
        }
      }
    }
  });






//para mostra mensaje en una campo de una tabl

    textos.forEach(function(texto) {
        const popup = texto.nextElementSibling;

        texto.addEventListener("mouseover", function() {
            const textoRect = texto.getBoundingClientRect();
            popup.style.top = `${textoRect.top - popup.offsetHeight}px`;
            popup.style.left = `${textoRect.left}px`;
            popup.style.display = "block";
        });

        texto.addEventListener("mouseout", function() {
            popup.style.display = "none";
        });
    });
});




</script>
    <script src="https://congresoutlvte.org/assets/dist/js/bootstrap.bundle.min.js"></script>


<script>
        // Datos de ejemplo
        const distributivosEntregados = 75; // Porcentaje de distributivos entregados
        const distributivosPendientes = 100 - distributivosEntregados;

        const informeFinalEntregado = 80; // Porcentaje de informes finales entregados
        const informeFinalPendiente = 100 - informeFinalEntregado;

        // Configuración del gráfico de Distributivos
        const ctxDistributivo = document.getElementById("distributivoChart").getContext("2d");
        const distributivoChart = new Chart(ctxDistributivo, {
            type: "pie",
            data: {
                labels: ["Entregados", "Pendientes"],
                datasets: [{
                    data: [distributivosEntregados, distributivosPendientes],
                    backgroundColor: ["#36A2EB", "#FF6384"]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "Cumplimiento de Entrega de Distributivos"
                    }
                }
            }
        });

        // Configuración del gráfico de Informes Finales
        const ctxInformeFinal = document.getElementById("informeFinalChart").getContext("2d");
        const informeFinalChart = new Chart(ctxInformeFinal, {
            type: "pie",
            data: {
                labels: ["Entregados", "Pendientes"],
                datasets: [{
                    data: [informeFinalEntregado, informeFinalPendiente],
                    backgroundColor: ["#36A2EB", "#FF6384"]
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: "top",
                    },
                    title: {
                        display: true,
                        text: "Cumplimiento de Entrega de Informes de Docente"
                    }
                }
            }
        });
    </script>



  </body>
</html>
                                   
';




$idareaconocimiento=0;
$elperiodoacademico="";
$inicio=1;
$i=0;
$j=0;
$thc=0;
$arrcolor=array(1=>"#F68081",2=>"#F5DA81",3=>"#A9F5A9",4=>"#A9F4F3",5=>"#CFCEF7",6=>"#D1A9F4",7=>"#F5A8F3",8=>"#80DBF5",9=>"#9BFE2F",10=>"#9BFE2F");

foreach($distributivodocentes as $row){
	

	if($inicio==1)
	{

	$data='
		<!doctype html>
		<html lang="en">
  		<head>
    		<meta charset="utf-8">
   		<meta name="viewport" content="width=device-width, initial-scale=1">  
    		<meta name="description" content="">
    		<meta name="author" content="Stalin Francis Quinde">
    		<meta name="generator" content="Hugo 0.101.0">
        	<meta property="og:site_name" content="Carrera en Tecnología de la Información" />
        	<meta property="og:image" content="https://repositorioutlvte.org/Repositorio/logos/logocti.png" />
        	<meta property="og:image:width" content="400" />
        	<meta property="og:image:height" content="400" />
    		<title> Carrera: '.$row->eldepartamento.'  - Periodo '.$row->elperiodoacademico.' </title>
    		<link rel="educaysoft" href="https://congresoutlvte.org/faci/">
    		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
		<link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" />';
	 	$data=$data.$data0;



	$data=$data.'
  		<section class="py-5 text-center container">
    		<div class="row py-lg-5" style="display:flex;  align-items:center; justify-content: center;" >
		<div style=" flex-basis: 40%"  >
		<img src="https://repositorioutlvte.org/Repositorio/qr/distributivo-'.$row->elperiodoacademico.'-'.$row->iddistributivo.'.png" height="150px">
		</div>
      		<div >
        	<h1 class="fw-light">'.$row->eldepartamento.'</h1>  
        	<p class="lead text-muted">Periodo:'.$row->elperiodoacademico.' :: '.$row->iddistributivo.'.</p>
        	<p class="lead text-muted">Distributivo Invidual del Docente</p>
      		</div>
    		</div>
  		</section>
  		<div class="album py-5 bg-light">
    		<div class="container">
      		<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
	 	$inicio=0;
		}


$data=$data.'<div class="col">
          <div class="card shadow-sm">
  <h1>Gráficos de Cumplimiento de Entrega de Documentos</h1>
    <div>
        <h2>Cumplimiento de Entrega de Distributivos</h2>
        <canvas id="distributivoChart"></canvas>
    </div>
    <div>
        <h2>Cumplimiento de Entrega de Informes de Docente</h2>
        <canvas id="informeFinalChart"></canvas>
    </div>

      		</div>
    		</div>';



$data=$data.'<div class="col">
          <div class="card shadow-sm">
		  <a  href="https://educaysoft.org/sica/evento/detalle/'.$inicio.'"><svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/>';

// Remote file url
$remoteFile = "https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/".trim($inicio).".jpg";

$file_headers = @get_headers($remoteFile);

// Check if file exists
//if(!file_exists($remoteFile)){

if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
 $data=$data.'<image href="https://repositorioutlvte.org/Repositorio/eventos/distributivoindividual.jpg"  height="100%" width="100%"/> </svg></a>

<div class="img-contenedor w3-card-4" style="position:absolute; top:0px;right:0px; border: 2px solid green; border-radius: 50%; width: 30%; display:flex; justify-content: center; align-items: center;">';

}else{
$data=$data.'<image href="https://repositorioutlvte.org/Repositorio/eventos/AreaConocimiento/'.trim($inicio).'-no.jpg" alt="No hay programación" height="100%" width="100%"/> </svg></a>
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
//	$data=$data.'<img src="https://repositorioutlvte.org/Repositorio/fotos/perfil.jpg" width="100%" height="100%" style="border-radius:50px;">';
	$data=$data.'<img src="https://repositorioutlvte.org/Repositorio/fotos/'.trim($row->cedula).'.jpg" width="100%" height="100%" style="border-radius:50px;">';


}



				$disable1='';
				$color1='green';

$data=$data.'</div>

	    <div class="card-body" style="background-color:'.$arrcolor[1].'"  >
	    <div style="font-size:24px; font-weight:bold; color:#333;  margin-top:10px;" >'.$row->eldocente.' </div>';	


			if(isset($row->distributivoindividualpdf)){
			$data=$data.'[<a href="https://repositorioutlvte.org/Repositorio/'.$row->distributivoindividualpdf.'"  '.$disable1.'><i class="fas fa-file-pdf" style="font-size:24px" ></i> <span style="color:'.$color1.'" >DistributivoIndividual</span></a>] -<br> ';
			}

			if(isset($row->informeactividaddocente)){
			$data=$data.'[<a href="https://repositorioutlvte.org/Repositorio/'.$row->informeactividaddocente.'"  '.$disable1.'><i class="fas fa-file-pdf" style="font-size:24px" ></i> <span style="color:'.$color1.'" >InformeActividadDocente</span></a>] - ';
			}
			$data=$data.'<br><br>';



$data=$data.'<div class="tabla-container">
  <table class="miTabla">
    <thead>
      <tr>
        <th>item</th>
        <th>tipo</th>
        <th>Actividad</th>
        <th>horas</th>
      </tr>
    </thead> 
<tbody>	
    ';

	$thoras=0;
foreach($docenteactividadacademica as $rowj){
			if(isset($rowj[$row->iddocente]['iddocente'])){		

			$data=$data.'<tr><td>'.$rowj[$row->iddocente]['item'] .'</td><td class="tipo">'.$rowj[$row->iddocente]['tipoactividad'].'</td><td>'.$rowj[$row->iddocente]['nombreactividad'].'</td><td><div class="container"><p class="texto">'.$rowj[$row->iddocente]['numerohoras'].'</p><div class="popup" id="popup"> <span class="popup-text">'.$rowj[$row->iddocente]['detalle'].'</span></div></div></td></tr>';
			$thoras=$thoras+$rowj[$row->iddocente]['numerohoras'];
			if(trim($rowj[$row->iddocente]['item'])=='4.1.1')
			{
			$thc=$thc+$rowj[$row->iddocente]['numerohoras']; // thc = total hora clase
			}

			}	
	//		echo $rowj; echo '<br>';
		}



              	$data=$data.'<tr><td></td><td></td><td>Total horas:</td><td>'.$thoras.'</td></tr>                          </tbody></table></div>                 <div class="d-flex justify-content-between align-items-center">


              </div>
            </div>
          </div>
        </div>
';


}


	$data1= str_replace('<xxxx>',$thc,$data1);
 	$data=$data.$data1;

	$file='application/views/cursos/distributivo-'.$row->elperiodoacademico.'-'.$row->iddistributivo.'.php';


	if ( !write_file($file, $data)){
	     echo 'Unable to write the file';
	}else{
	    echo $file."\n";
	}



echo "archivo generado<br>";
echo "<br>";
echo $file;
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

echo $thc;

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

