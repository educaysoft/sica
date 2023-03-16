<!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
/* Style the body */
body {
  font-family: Arial;
  margin: 0;
}

/* Header/Logo Title */
.header {
  padding: 60px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 30px;
}

/* Page Content */
.content {padding:20px;}


/*Para lista de check*/

 .dbgOuter{
            border: solid 1px #888;
            border-radius: 4px;
            padding: 3px 8px 0px 14px;
            width: 340px;
            margin: 0 auto;
            font-size: 10.5pt;
        }
        .dbgCont{
            display: inline-block;
            height: 24px;
            margin-left: 6px;
        }
        /* Base for label styling */
        .dbgCheck:not(:checked),
        .dbgCheck:checked {
            position: absolute;
            left: -9999px;
        }
        .dbgCheck:not(:checked) + label,
        .dbgCheck:checked + label {
            display:inline-block;
            position: relative;
            padding-left: 25px;
            cursor: pointer;
        }

        /* checkbox aspect */
        .dbgCheck:not(:checked) + label:before,
        .dbgCheck:checked + label:before {
            content: '';
            position: absolute;
            left:0; top: 1px;
            width: 17px; height: 17px;
            border: 1px solid #aaa;
            background: #f8f8f8;
            border-radius: 3px;
            box-shadow: inset 0 1px 3px   rgba(0,0,0,.3)
        }
        /* checkmark aspect */
        .dbgCheck:not(:checked) + label:after,
        .dbgCheck:checked + label:after {
            content: '✔';
            position: absolute;
            top: 2px; left: 5px;
            font-size: 14px;
            color: #09ad7e;
            transition: all .2s;
        }
        /* checked mark aspect changes */
        .dbgCheck:not(:checked) + label:after {
            opacity: 0;
            transform: scale(0);
        }
        .dbgCheck:checked + label:after {
            opacity: 1;
            transform: scale(1);
        }
        /* disabled checkbox */
        .dbgCheck:disabled:not(:checked) + label:before,
        .dbgCheck:disabled:checked + label:before {
            box-shadow: none;
            border-color: #bbb;
            background-color: #ddd;
        }
        .dbgCheck:disabled:checked + label:after {
            color: #999;
        }
        .dbgCheck:disabled + label {
            color: #aaa;
        }
        /* accessibility */
        .dbgCheck:checked:focus + label:before,
        .dbgCheck:not(:checked):focus + label:before {
            border: 1px dotted blue;
        }

        .dbgCheck{
            display:inline-block;
            width:90px;
            height:24px;
            margin:1em;
        }





        /* Useless styles, just for demo design */

        body {
            font-family: "Open sans", "Segoe UI", "Segoe WP", Helvetica, Arial, sans-serif;
            color: #666;
        }
        h1, h2 {
            margin-bottom: 5px;
            font-weight: normal;
            text-align: center;
        }
        h2 {
            margin: 5px 0 2em;
            color: #aaa;
        }
        form {
            width: 80px;
            margin: 0 auto;
        }
        .txtcenter {
            margin-top: 4em;
            font-size: .9em;
            text-align: center;
            color: #aaa;
        }
        .copy {
            margin-top: 2em;
        }
        .copy a {
            text-decoration: none;
            color: #4778d9;
        }








</style>
</head>
<body>
<?php
$seccion="Instrucción a los Fundamentos de Programación";
$idreactivo=$tema['idreactivo'];
$idpregunta=array(5,6,7);
$idrespueta=array(array(7,8,9),array(10,11,12));

$elvideo="";

?>



<div style="margin: auto; width: 100%; border:5px solid red;">
	<div class="header">
	  <h1><?php echo "Curso :".$silabo["idsilabo"]; ?></h1>
	  <p><?php echo $silabo["nombre"]; ?></p>
	</div>


	<div class="learn1" style="width: 100%; margin:auto; ">
<div style="padding:5px; border:2px solid yellow;">
<div class="dbgOuter" style="border: 2px solid blue; width: 80%;">

	<?php
		foreach($videotutorial as $row){
			$elvideo=$row->enlace;
	?>	
			<div class="form-check form-check-inline">

			

				<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" onClick="show_unidad('<?php echo $row->nombre; ?>','<?php echo $row->enlace; ?>','<?php echo $row->idreactivo; ?>','<?php echo  $this->session->userdata['logged_in']['idpersona']; ?>')"/>   
				<label class="form-check-label" for="inlineCheckbox1">Videotutorila-<?php echo $row->idvideotutorial;?></label>
			</div>

	<?php } ?>
   </div>
	</div>	
<div class="progress">
			  <div class="progress-bar progress-bar-striped active" role="progressbar"  aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%">
				    10%
			  </div>
		</div>
	<div id="unidad" style="padding:10px; width:80%;  display:none;">
		 <?php echo $seccion ?>
	</div>

<!---	<div id="mvideo" style="padding:10px; width:100%;  height:500px; display:none;"> --->
	<div id="mvideo" style="padding:10px; width:100%;  height:500px;">
	<iframe id="video"  src=<?php echo "'".$elvideo."'"; ?>  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border:0; width:100%; height:100% ;"></iframe>  
		</div>
	</div>



	<div id="learn1" style="width: 100%; margin:auto; display:flex; display:none; ">
		<div id="evaluar" style="padding:10px; width:20%; ">
			<?php echo '<button id="evaluar" onclick="get_certificado('.$idreactivo.','.$evento["idevento"].');">Evaluar</button>'; ?> 

		</div>
		<div style="padding:10px; width:70%; ">
		  
		</div> 
	</div>

<!--- <div id="learn2" style="width: 100%; margin:auto; display:none";> --->
<div id="learn2" style="width: 100%; margin:auto; ";>
	<div id="evaluacion" style="padding:10px; width:80%; margin:auto;">

	</div>

	<div id="detalle" style="padding:10px; width:80%; margin:auto;">

	</div>

	<div id="preguntas" style="padding:10px; width:100%; margin:auto;">

<?php 
$i=1;
foreach($preguntas as $row)
{
	echo '<div class="form-check form-check-inline">';
	echo '<input class="form-check-input" type="checkbox" id="inlineCheckbox'.$i.'" value="option'.$i.'" onclick="get_pregunta('.$row->idpregunta.')">'; 
	echo '<p class="form-check-label" for="inlineCheckbox'.$i.'">'.$i.'</label>';
	echo '</div>';
$i=$i+1;

}
?>
<!------
<?php echo '<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" onclick="get_pregunta('.$idpregunta[0].')">'; ?>
		  <p class="form-check-label" for="inlineCheckbox1">1</label>
		</div>
		<div class="form-check form-check-inline">
<?php echo '<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" onclick="get_pregunta('.$idpregunta[1].')">'; ?>
		  <label class="form-check-label" for="inlineCheckbox2">2</label>
		</div>
		<div class="form-check form-check-inline">
<?php echo '<input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3"   onclick="get_pregunta('.$idpregunta[2].')">'; ?>
		  <label class="form-check-label" for="inlineCheckbox3">3 </label>
		</div>
--->
	</div>

	<div id="pregunta" style="padding:10px; width:80%; margin:auto;">

	</div>
	<div id="respuesta" style="padding:10px; width:80%; margin:auto;">

	</div>



</div>
	<div id="certificado" style="padding:10px; width:80%; margin:auto; border:1px solid blue; text-align: center;">
<!---			<?php echo '<button id="evaluar" onclick="get_certificado(\''.site_url('evento/listar_participantes').'\','.$evento["idevento"].');" >En hora buena! Ya puedes imprimir tu certificado</button>'; ?> 
-->			<?php echo '<button id="evaluar" onclick="get_certificado('.$_GET["idpersona"].','.$evento["idevento"].');" >En hora buena! Ya puedes imprimir tu certificado</button>'; ?> 
	</div>
</div>




<script>




function get_certificado(idpersona, idevento)
{

	$.ajax({
        url: "<?php echo site_url('participante/get_participante') ?>",
        data: {idpersona:idpersona,idevento:idevento},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){
        var iddocumento = data[0].iddocumento;



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
	      if(xhr.status==200)
	      {
		alert("El certificado aun no ha sido generado, comuniquese con el administrador");
		}else{      
        alert(xhr.status);
        alert(thrownError);
		}
      }

    })


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })
}




	function show_unidad(tunidad,lvideo,idreactivo,idpersona)
	{

		document.getElementById('unidad').innerHTML=tunidad;
		document.getElementById('unidad').style.display='block';
		let xx=document.getElementById('video');
		xx.setAttribute("src",lvideo);
		document.getElementById('mvideo').style.display='block';
		document.getElementById('learn1').style.display='block';
		document.getElementById('evaluar').innerHTML='<button id="evaluar" onclick="get_reactivo('+idreactivo+','+idpersona+');">Evaluar-'+idreactivo+'</button>' 
               get_reactivo(idreactivo,idpersona);
	}



function get_reactivo(idreactivo,idpersona) {
	 var fecha=<?php echo $fecha; ?>;
	 btn=document.getElementById('learn2');
	 btn.style.display="block";
    $.ajax({
        url: "<?php echo site_url('reactivo/get_reactivo') ?>",
        data: {idreactivo:idreactivo,idpersona:idpersona},
        method: 'GET',
        async : false,
        dataType : 'json',
        success: function(data){
        var html1 = data.nombre;
        var html2= data.detalle;
        $('#evaluacion').html(html1);
        $('#detalle').html(html2);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

    $.ajax({
        url: "<?php echo site_url('pregunta/get_preguntas') ?>",
        data: {idreactivo: idreactivo},
        method: 'GET',
        async : false,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
		j=i+1;
		//html += '<div class="form-check form-check-inline">';
		html += '<div class="form-check">';
		html += '<input class="form-check-input" type="checkbox" id="inlineCheckbox'+j+'" value="option1" onclick="get_pregunta('+data[i].idpregunta+','+j+')">'; 
		html += '<label class="form-check-label" for="inlineCheckbox'+j+'">Pregunta-'+j+'</label>';
		html+='<div id="pregunta'+j+'" style="padding:10px; width:80%; margin:auto;">';
		html+='</div>';
		html+='<div id="respuesta'+j+'"  style="padding:10px; width:80%; margin:auto;">';
		html+='</div>';
		html += '</div>';
	}

        $('#preguntas').html(html);


        for(i=0; i<data.length; i++){
		j=i+1;

		get_pregunta(data[i].idpregunta,j); 
	}


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}


function get_pregunta(idpregunta,idx) {
	$.ajax({
        url: "<?php echo site_url('pregunta/get_pregunta') ?>",
        data: {idpregunta:idpregunta},
        method: 'get',
        async : false,
        datatype : 'json',
        success: function(data){
        var html1 = data[0].pregunta;
	var idx1="#pregunta"+idx;
        $(idx1).html(html1);


        },
      error: function (xhr, ajaxoptions, thrownerror) {
        alert(xhr.status);
        alert(thrownError);
      }

    })
	    
	var idpersona=<?php echo  $this->session->userdata['logged_in']['idpersona']; ?>;
	var idrespuesta=0;
	var acierto=0;
    $.ajax({
        url: "<?php echo site_url('evaluacion/get_evaluacion') ?>",
        data: {idpersona:idpersona,idpregunta:idpregunta},
        method: 'GET',
        async : false,
        dataType : 'json',
        success: function(data){
	if(typeof data[0].idrespuesta !== 'undefined'){
		idrespuesta = data[0].idrespuesta;
		acierto = data[0].acierto;
	}else{

		alert("no encontro evaluado ");
		idrespuesta = 0;
		acierto=0;
	}
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })




    $.ajax({
        url: "<?php echo site_url('respuesta/get_respuesta') ?>",
        data: {idpregunta:idpregunta},
        method: 'GET',
        async : false,
        dataType : 'json',
        success: function(data){
	var idpersona=<?php echo  $this->session->userdata['logged_in']['idpersona']; ?>;
        var html = '';
        var i;
	html+="<div";
	html+="<form>";
	html+="<fieldset id='group"+idx+"' style=' margin-left:0; display:flex; flex-direction:column;'>";
        for(i=0; i<data.length; i++){
		j=i+1;
		if(data[i].idrespuesta==idrespuesta && acierto==0)
		{
		html += '  <input type="radio" id="'+j+'" name="respuesta" id="'+i+'" value="'+data[i].respuesta+'" onclick="evaluado('+data[i].idreactivo+','+data[i].acierto+','+data[i].idpregunta+','+idpersona+','+data[i].idrespuesta+')"  checked>';
		html += '  <label for="huey" style="color:red">'+data[i].respuesta+'</label>';
		}
		else if(data[i].idrespuesta==idrespuesta && acierto==1)
		{
		html += '  <input type="radio" id="'+j+'" name="respuesta" id="'+i+'" value="'+data[i].respuesta+'" onclick="evaluado('+data[i].idreactivo+','+data[i].acierto+','+data[i].idpregunta+','+idpersona+','+data[i].idrespuesta+'  )"  checked>';
		html += '  <label for="huey" style="color:green">'+data[i].respuesta+'</label>';
		}
		else
		{
		html += '  <input type="radio" id="'+j+'" name="respuesta" id="'+i+'" value="'+data[i].respuesta+'" onclick="evaluado('+data[i].idreactivo+','+data[i].acierto+','+data[i].idpregunta+','+idpersona+','+data[i].idrespuesta+')">';
		html += '  <label for="huey" >'+data[i].respuesta+'</label>';
		}

        }
	html+="</fieldset>";
	html+="</form>";
	html+="</div";
	idx1='#respuesta'+idx;
        $(idx1).html(html);
        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })



}

function evaluado(idreactivo,acierto,idpregunta,idpersona,idrespuesta)
{
//	alert(acierto+' '+idpregunta+' '+idpersona);

 var fecha='<?php echo $fecha; ?>';
 var idevento=<?php echo $evento["idevento"]; ?>;


$.ajax({
        url: "<?php echo site_url('evaluacion/save2') ?>",
        data: {acierto:acierto,idreactivo:idreactivo,idpregunta:idpregunta,idpersona:idpersona,idrespuesta:idrespuesta,fecha:fecha,idevento:idevento},
        method: 'GET',
        async : false,
        success: function(data){
	alert("Evaluacion realizada");


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



</div>
