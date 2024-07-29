<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>

<?php echo form_open('examencomplexivo/save_edit',array('id'=>'eys-form')); ?>
  <ul>
	<li> <a href="javascript:{}" onclick="document.getElementById('eys-form').submit(); return false;">Guardar</a></li>
        <li> <?php echo anchor('examencomplexivo', 'Cancelar'); ?></li>
  </ul>
</div>
<br>




<table>











  <tr>
     <td>idexamencomplexivo:</td>
     <td><?php echo form_input(array("name"=>'idexamencomplexivo','id'=>'idexamencomplexivo','value'=>$examencomplexivo['idexamencomplexivo'],'placeholder'=>'Idexamencomplexivos')) ?></td>
  </tr>
 
 

  

  





<tr>
  <td>Nombre/titulo:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"nombre","id" =>"nombre");    
echo form_textarea('nombre',$examencomplexivo['nombre'],$textarea_options ); ?></td>
</tr>

<tr>
  <td>Resumen:</td>
  <td><?php 
$textarea_options = array('class' => 'form-control','rows' => '4',   'cols' => '20', 'style'=> 'width:50%;height:100px;', "placeholder"=>"resumen","id" =>"resumen");    
echo form_textarea('resumen',$examencomplexivo['resumen'],$textarea_options ); ?></td>
</tr>

<tr>
<td> Estado del evento:</td>
<td><?php
$options= array('--Select--');
foreach ($estadoexamencomplexivos as $row){
	$options[$row->idestadoexamencomplexivo]= $row->nombre;
}

 echo form_dropdown("idestadoexamencomplexivo",$options, $examencomplexivo['idestadoexamencomplexivo']);  ?></td>
</tr>

   



















   

</table>
<?php echo form_close(); ?>

   <script>

//=====================
//
// Upload file
function uploadFiles(url1) {

  var totalfiles = document.getElementById('files').files.length;
  alert("Este proceso guardará todas los datos ingresados");	
  if(totalfiles > 0 ){

    var idexamencomplexivo = 0;
    alert(1);
    var idtipodocu = document.getElementById('idtipodocu').value;
    alert(2);
    var archivopdf = document.getElementById('archivopdf').value;
    alert(3);
    var descripcion =  document.getElementById('descripcion').value;
    alert(4);
    var fechaelaboracion = document.getElementById('fechaelaboracion').value;
    alert(5);
    var idordenador =  document.getElementById('idordenador').value;
    alert(6);
    var iddirectorio = document.getElementById('iddirectorio').value;
    alert(7);
    var iddexamencomplexivo_estado = 1;
    alert(8);
    var idpersona = document.getElementById('idpersona').value;
    alert(9);


		//Recupera el nombre del archivo
		 alert("Guardado exitoso...ahora procedemos a cargar el archivo..con un nuevo nombre"+archivopdf);
		//Para cargar el archivo	
		var formData = new FormData();
   	 	// Read selected files
    		for (var index = 0; index < totalfiles; index++) {
      			formData.append("files[]", document.getElementById('files').files[index]);
    		}
      		formData.append("archivopdf",archivopdf );
    		var xhttp = new XMLHttpRequest();
		var e =document.getElementById('idordenador');
		var url2 = "https://"+e.options[e.selectedIndex].text;

		if(url2.slice(-1) == '/'){
			url2 = url2+"cargafile.php";
		}else{
			url2 = url2+"/cargafile.php";
		}
                alert("Se va a ejecutar "+ url2);	
    		// Set POST method and ajax file path
    		xhttp.open("POST", url2, true);

    		// call on request changes state
    		xhttp.onreadystatechange = function() {
 		if(xhttp.readyState === XMLHttpRequest.DONE) {
    			var status = xhttp.status;
    			if (status === 0 || (status >= 200 && status < 400)) {
      				// The request has been completed successfully
				var response = xhttp.responseText;
          			alert(response + "archivo cargado");
				archivo_cargado(idexamencomplexivo);

				history.back(); //Go to the previous page
       			}else{
				alert("No se pudo cargar el archivo");
			}
			}
              	};
    		// Send request with data
    		xhttp.send(formData);
  }else{
    alert("Porfavor seleccione un archivo");
  }

}



function archivo_cargado(idexamencomplexivo) {
	var idexamencomplexivo_estado = 2;
    $.ajax({
        url: "<?php echo site_url('examencomplexivo/save_edit') ?>",
        data: {idexamencomplexivo:idexamencomplexivo,idexamencomplexivo_estado:idexamencomplexivo_estado},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;

        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}












function get_directorio() {
	var idordenador = $('select[name=idordenador]').val();
    $.ajax({
        url: "<?php echo site_url('examencomplexivo/get_directorio') ?>",
        data: {idordenador: idordenador},
        method: 'POST',
	async : true,
        dataType : 'json',
        success: function(data){
        var html = '';
        var i;
        for(i=0; i<data.length; i++){
        html += '<option value='+data[i].iddirectorio+'>'+data[i].ruta+'</option>';
        }
        $('#iddirectorio').html(html);


        },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }

    })

}








 async function nombredearchivo()
{
 indice=document.getElementById("idexamencomplexivo").value;
 fecha=document.getElementById("fechaelaboracion").value;
 var emisor=document.getElementById("idemisor");
if(emisor.length>0)
{
     var emisor1=emisor.options[0].text;
     var emisor2=emisor1.split(/\W+/);
     var initial="";
     for( var i=0; i<emisor2.length; i++)
      {
       initial=initial+emisor2[i].toUpperCase().charAt(0);
      }
      initial=fecha+"-"+initial+'-'+indice.padStart(6,"0")+".pdf";
//      alert(initial);
      document.getElementById("archivopdf").value=initial;
}

};

    async function cargaarchivo(url)
{
    
    let formData = new FormData(); 
//    formData.append("filepdf", filepdf.files[0]);
formData.append("filepdf",document.getElementById('filepdf').files[02]);
formData.append("archivopdf",document.getElementById('archivopdf').value);

    await fetch(url, {method: "POST", body: formData}); 
  alert('The file has been uploaded successfully.');

};





function generar_examencomplexivo()
{
	var idexamencomplexivo=document.getElementById("idexamencomplexivo").value;
	var descripcion=document.getElementById("descripcion").value;
   $.ajax({
        url: "<?php echo site_url('examencomplexivo/get_parametros'); ?>",
        data: {idexamencomplexivo:idexamencomplexivo},
        method: 'GET',
	async :false ,
        dataType : 'json',
        success: function(data){
	idexamencomplexivo=data.idexamencomplexivo;
	idexamencomplexivo2=data.idexamencomplexivo;
	if(idexamencomplexivo>0){

var idtipodocu= data.idtipodocu;

//alert(idexamencomplexivo);
//var asunto=data.asunto; // "CERTIFICADO - "+data.titulo;

let fechaelaboracion=data.fechafinaliza;
	fechaelaboracion=fechaelaboracion.substring(0,10);
var idevento=data.idevento;
var idordenador=data.idordenador;
var iddirectorio=data.iddirectorio;
var idexamencomplexivo_estado=3;
var idpersona=data.idpersona;
var idparticipante=data.idparticipante;

var ancho_x=data.ancho_x;
var alto_y=data.alto_y;

var posi_nomb_x=data.posi_nomb_x;
var posi_nomb_y=data.posi_nomb_y;
var size_nombre=data.size_nombre;

var posi_codigo_x=data.posi_codigo_x;
var posi_codigo_y=data.posi_codigo_y;

var posi_fecha_x=data.posi_fecha_x;
var posi_fecha_y=data.posi_fecha_y;

var firma1_x=data.firma1_x;
var firma1_y=data.firma1_y;

var firma2_x=data.firma2_x;
var firma2_y=data.firma2_y;

var firma3_x=data.firma3_x;
var firma3_y=data.firma3_y;

var texto1=data.texto1;
var posi_texto1_x=data.posi_texto1_x;
var posi_texto1_y=data.posi_texto1_y;
var ancho_texto1=data.ancho_texto1;
var alto_texto1=data.alto_texto1;
var font_size_texto1=data.font_size_texto1;

var idexamencomplexivo2=data.idexamencomplexivo2;
var maquina=data.elordenador;
var elparticipante=data.elparticipante;
var ruta=data.ruta
var archivopdf=data.archivopdf;
var archivopdf2= data.archivopdf2;	
var filename="";
      alert("se asigno las variables");

// Generando el certificado
	
  	var formData = new FormData();
	var modelo=archivopdf;
	formData.append("descripcion", descripcion);
	formData.append("elparticipante", elparticipante);
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


	
    	//formData.append("texto1", texto1);
    	formData.append("texto1", descripcion);
    	formData.append("posi_texto1_x", posi_texto1_x);
    	formData.append("posi_texto1_y", posi_texto1_y);
    	formData.append("ancho_texto1", ancho_texto1);
    	formData.append("alto_texto1", alto_texto1);
    	formData.append("font_size_texto1", font_size_texto1);

    	formData.append("fechafinaliza", fechaelaboracion);



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
				alert("No se pudo cargar el archivo"+status);
			}
			}else{ alert("que paso chico");}
              	};
	}
	},
      error: function (xhr, ajaxOptions, thrownError){ 
        alert(xhr.status);
        alert(thrownError);
      }

    })




}




</script>



