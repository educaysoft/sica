<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($portafolio) and !empty($portafolio))
{
?>
        <li> <?php echo anchor('portafolio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('portafolio/anterior/'.$portafolio['idportafolio'], 'anterior'); ?></li>
        <li> <?php echo anchor('portafolio/siguiente/'.$portafolio['idportafolio'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('portafolio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('portafolio/add', 'Nuevo'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('portafolio/edit/'.$portafolio['idportafolio'],'Edit'); ?></li>
<!--        <li style="border-right:1px solid green"> <?php echo anchor('portafolio/delete/'.$portafolio['idportafolio'],'Delete'); ?></li> -->
        <li> <?php echo anchor('portafolio/listar/','Listar'); ?></li>
        <li> <?php echo anchor('portafolio/listar_doce/','Portafolio'); ?></li>
        <li> <?php echo anchor('portafolio/reportepdf/'.$portafolio['idportafolio'],'Reporte'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('portafolio/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('portafolio/save_edit') ?>
<?php echo form_hidden('idportafolio',$portafolio['idportafolio']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id portafolio:</label>
	<div class="col-md-10">


     <?php echo form_input('idportafolio',$portafolio['idportafolio'],array("id"=>"idportafolio","disabled"=>"disabled",'placeholder'=>'Idportafolios')); ?>
 
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('persona/actual/'.$portafolio['idpersona'], 'La persona:'); ?></label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->lapersona;
}

echo form_input('lapersona',$options[$portafolio['idpersona']],array("id"=>"lapersona","disabled"=>"disabled", "style"=>"width:600px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Id persona:</label>
	<div class="col-md-10">
  
     <?php 
$options= array("NADA");
foreach ($personas as $row){
	$options[$row->idpersona]= $row->idpersona;
}
echo form_input('idpersona',$options[$portafolio['idpersona']],array("id"=>"idpersona","disabled"=>"disabled", "style"=>"width:600px")); ?>
	</div> 
</div>


<!----

<div class="form-group row">
    <label class="col-md-2 col-form-label">  Documento (<?php echo "<a onclick='verpdf()'>Ver PDF</a>" ?>) :</label>
	<div class="col-md-10">
		<?php
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}
echo form_input('iddocumento',$options[$portafolio['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled","style"=>"width:600px"));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Estado del documento:</label>
	<div class="col-md-10">
	<?php 
	$options= array("NADA");
	foreach ($portafolioestados as $row){
		$options[$row->idportafolioestado]= $row->nombre;
	}
	echo form_input('idportafolioestado',$options[$portafolio['idportafolioestado']],array("disabled"=>"disabled", "style"=>"width:600px")); 
	?>

	</div> 
</div> 


---->


<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('periodoacademico/actual/'.$portafolio['idperiodoacademico'], 'Periodo académico:'); ?></label>
	<div class="col-md-10">
	<?php 
	$options= array("NADA");
	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]=$row->nombrecorto.' - '.$row->nombrelargo;
	}
	echo form_input('idperiodoacademico',$options[$portafolio['idperiodoacademico']],array("id"=>"idperiodoacademico","disabled"=>"disabled", "style"=>"width:600px")); 
	?>

	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Ordenador:</label>
     	<?php 
	$options= array("NADA");
	foreach ($ordenadores as $row){
		$options[$row->idordenador]= $row->nombre;
	}

	?>
	<div class="col-md-10">
		<?php
			echo form_input('idordenador',$options[$portafolio['idordenador']],array("id"=>"idordenador","disabled"=>"disabled"));
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Directorio:</label>
     	<?php 
	$options= array("NADA");
	foreach ($directorios as $row){
		$options[$row->iddirectorio]= $row->ruta;
	}
	?>
	<div class="col-md-10">
		<?php
		echo form_input('iddirectorio',$options[$portafolio['iddirectorio']],array("id"=>"iddirectorio", "disabled"=>"disabled")); 
		?>
	</div> 
</div>



<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">
<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
         <a class="btn btn-danger" href="<?php echo base_url('documentoportafolio/add/'.$portafolio['idportafolio']) ?>">Nuevo documento</a>  <!--            <b>Documentos del portafolio: </b> -->

        </div>
        <div class="pull-right">
<div class="col-md-10">


	<div style="display: inline-block";>
		<div style="float: left;">
			<?php 
			$upload_data = array('type' => 'file','name' => 'files','id' => 'files');
			echo form_upload($upload_data );?>
		</div>
		<div style="float: left;">
			<?php 
    			$options= array('--Select--');
    			foreach ($ordenadores as $row){
      				$options[$row->idordenador]= $row->nombre;
   			}
			// url de la funcion php que carga el archivo en el 
			$url1= base_url()."index.php/documento/save";
			$js='onClick="cargarFile(\''.$url1.'\')"';     
			echo form_button("carga","Cargar",$js); ?>
		</div> 
	</div>
</div>
        </div>
    </div>
</div>
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddopo</th>
	 <th>iddocu</th>
	 <th>tipo</th>
	 <th>titulo</th>
	 <th>elabor.</th>
	 <th>archvo.</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
	</div> 
</div>




<?php echo form_close(); ?>


<script type="text/javascript">

$(document).ready(function(){
	var idpersona=document.getElementById("idpersona").value;
//	var idportafolio=document.getElementById("idportafolio").value;
	var idperiodoacademico='<?php echo $portafolio["idperiodoacademico"]; ?>';
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('portafolio/documento2_data')?>', type: 'GET',data:{idpersona:idpersona,idperiodoacademico:idperiodoacademico}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddocumentoportafolio');
var retorno= $(this).data('retorno1');
window.location.href = retorno+'/'+id;
});

$('#show_data').on('click','.item_doc',function(){
var id= $(this).data('iddocumento');
var retorno= $(this).data('retorno2');
window.location.href = retorno+'/'+id;
});



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





$('#show_data').on('click','.item_enviar',function(){
        var archivo="";
	var iddocumento= $(this).data('iddocumento');
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
                 var msg="<div style='text-align:center; border-radius:25px; border:2px solid #73AD21; padding:10px;'> Estimado/a <b>"+ $(this).data('lapersona')+"</b> ,  Tus documentos estan siendo guadados y clasificados en la plataforma Cloud de la Carrera en Tecnología de la Información. Puedes  acceder a la plataforma utilizando el siguiente enlace <a href='"+"https://educaysoft.org/sica/login"+"'>Login</a>. Una vez que hayas solicitado y recibido tus credenciales, podrás acceder a tu portafolio. <br> Te informamos que tu portafolio ha sido  actualizado  con el documenoto <br> "+$(this).data('asunto')+". </br> Puedes  desacargar el documento directamente en el siguiente enlace.<br> <span sytle='font-size:30px;'><a href='"+certi+"'>tu documento</a></spane></div>" ;
		 var mailto= "stalin.francis@utelvt.edu.ec";
		 var secure="siteform";
		 var idpersona=$(this).data('idpersona');
		 var asunto=$(this).data('subject'); //'UTLVTE - VINCULACION MANTENIMIENTO DE LABORATORIO DE COMPUTACIÓN'; //'ARMADA DEL ECUADOR - UTLVTE : CERTIFICACIÓN DIGITAL';

		 var head=$(this).data('head');  ""; // "<div> <b>Las Jornadas virtuales de fortalecimiento de la EGB y BGU de Esmeraldas en propuestas educativas vinculadas a los intereses marítimos</b>, ha sido organizado por la Armada del Ecuador con el apoyo técnico de la Universidad Técnica Luis Vargas Torres de Esmeraldas, gracias al convenio marco que tienen estas dos instituciones. <br><br>  Este correo le ha sido entregado después de haber terminado de forma satisfactoria la capacitación sobre temas marítimos, lo que lo hace merecedor/a a una certificación que reposará de forma segura en los servidores de la Universidad y que puede descargar accediendo al siguiente link</div>";
			
		var foot0=$(this).data('foot'); //"<div style='text-align:center; background-color:lightgrey; padding:10px;'> Aprovechamos la oportunidad para informarte que la Universidad Técnica Luis Vargas Torres esta ofertando los siguientes programas de postgrado.<br><br> <img src='http://educaysoft.org/maestria/maestriasutlvte.jpg' width='100%' height='100%'></div>" ;
		 var foot=" <div style='text-align:center; background-color:lightgrey; font-size:12px; padding-top:30px;'> Este correo ha sido enviado a "+mailto+ ", de acuerdo a la Ley Orgánica de Protección de datos, usted tiene el derecho a solicitar a la Universidad Técnica Luis Vargas Torres, la actualización, inclusión, supresión y/o tratamiento de los datos personales incluidos en sus bases de datos, con este correo electrónico usted acepta recibir información de las actividades académicas que realiza el Alma Mater así como nuestra propuestas académicas <br><br> Este correo fue generado y enviado automáticamente desde el sistema cloud elaborado por docentes y estudiantes de la Carrera en Tecnología de la Información</div> ";

		msg=head+msg+foot0+foot;

		var correode="tecnologiasdelainformacion@utelvt.edu.ec";
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









</script>




</body>









</html>
