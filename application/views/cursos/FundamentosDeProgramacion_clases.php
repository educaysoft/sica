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
</style>
</head>
<body>

<div style="margin: auto; width: 60%; border:5px solid red;">
<div class="header">
  <h1>Fundamentos de programación</h1>
  <p>Aprenda a programación en C++</p>
</div>

<div class="learn1" style="width: 100%; margin:auto">
	<div style="padding:10px; width:80%; margin:auto;">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/ABGl0PhDemI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="margin:auto;"></iframe>  
	</div>
</div>

<div class="learn1" style="width: 100%; margin:auto">
	<div style="padding:10px; width:80%; margin:auto;">
 		<button onclick="get_evaluacion();">Evaluar</button> 
	</div>
</div>

<div class="learn2" style="width: 100%; margin:auto">
<div id="idevaluacion" style="padding:10px; width:80%; margin:auto;">

</div>

<div id="detalle" style="padding:10px; width:80%; margin:auto;">

</div>


<div id="detalle" style="padding:10px; width:80%; margin:auto;">
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" onclick="get_pregunta()"  >
	  <p class="form-check-label" for="inlineCheckbox1">1</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2" checked>
	  <label class="form-check-label" for="inlineCheckbox2">2</label>
	</div>
	<div class="form-check form-check-inline">
	  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
	  <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
	</div>

</div>

<div id="pregunta" style="padding:10px; width:80%; margin:auto;">

</div>
<div id="respuesta" style="padding:10px; width:80%; margin:auto;">

</div>





</div>




<script>


function get_evaluacion() {
        var idevaluacion = 1; // $('select[name=idordenador]').val();
	alert(idevaluacion);
    $.ajax({
        url: "<?php echo site_url('evaluacion/get_evaluacion') ?>",
        data: {idevaluacion: idevaluacion},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){
        var html1 = data[0].nombre;
        var html2= data[0].detalle;
        $('#idevaluacion').html(html1);
        $('#detalle').html(html2);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}


function get_pregunta() {
        var idevaluacion = 1; // $('select[name=idordenador]').val();
        var idpregunta = 1; // $('select[name=idordenador]').val();
    $.ajax({
        url: "<?php echo site_url('pregunta/get_pregunta') ?>",
        data: {idevaluacion: idevaluacion,idpregunta:idpregunta},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){
        var html1 = data[0].pregunta;
        $('#pregunta').html(html1);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

	    

    $.ajax({
        url: "<?php echo site_url('respuesta/get_respuesta') ?>",
        data: {idpregunta:idpregunta},
        method: 'POST',
        async : false,
        dataType : 'json',
        success: function(data){

     var html = '';
        var i;
        for(i=0; i<data.length; i++){
html += '<div>';
html += '  <input type="radio" id="'+data[i].idrespuesta+'" name="drone" value="h'+data[i].respuesta+'">';
html += '  <label for="huey">'+data[i].respuesta+'</label>';
html += '</div>';


        }
        $('#respuesta').html(html);





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
