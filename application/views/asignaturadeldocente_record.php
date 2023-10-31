<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($asignaturadeldocente))
{
?>
   <li> <?php echo anchor('asignaturadeldocente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('asignaturadeldocente/anterior/'.$asignaturadeldocente['idasignaturadeldocente'], 'anterior'); ?></li>
   <li> <?php echo anchor('asignaturadeldocente/siguiente/'.$asignaturadeldocente['idasignaturadeldocente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('asignaturadeldocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('asignaturadeldocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('asignaturadeldocente/edit/'.$asignaturadeldocente['idasignaturadeldocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('asignaturadeldocente/quitar/'.$asignaturadeldocente['idasignaturadeldocente'],'Quitar'); ?></li>
        <li> <?php echo anchor('asignaturadeldocente/listar/','Listar'); ?></li>
        <li> <?php echo anchor('asignaturadeldocente/reportepdf/'.$asignaturadeldocente['idasignaturadeldocente'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('asignaturadeldocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('asignaturadeldocente/save_edit') ?>
<?php echo form_hidden('idasignaturadeldocente',$asignaturadeldocente['idasignaturadeldocente']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id asignatura docente: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('idasignaturadeldocente',$asignaturadeldocente['idasignaturadeldocente'],array("id"=>"idasignaturadeldocente","disabled"=>"disabled",'placeholder'=>'Idasignaturadeldocentes')); 
		?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('docente/actual/'.$asignaturadeldocente['iddocente'], 'Docente:'); ?>  </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

echo form_input('eldocente',$options[$asignaturadeldocente['iddocente']],array("id"=>"eldocente","disabled"=>"disabled",'style'=>'width:500px;')); 

echo form_input(array('name'=>'iddocente',"type"=>"hidden","value"=>$asignaturadeldocente['iddocente'],"id"=>"iddocente")); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('asignatura/actual/'.$asignaturadeldocente['idasignatura'], 'Asignatura:'); ?> </label>
	<div class="col-md-10">
     	<?php 
    $options= array("NADA");
    foreach ($asignatura as $row){
	      $options[$row->idasignatura]= $row->idasignatura.' - '.$row->area.' - '.$row->nivel.' - '.$row->nombre;
    }
    echo form_input('idasignatura',$options[$asignaturadeldocente['idasignatura']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('documento/actual/'.$asignaturadeldocente['iddocumento'], 'Documento:'); ?>  </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

echo form_input('iddocumento',$options[$asignaturadeldocente['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled",'style'=>'width:500px;')); 

		?>
	</div> 
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha desde:</label>
	<div class="col-md-10">
      <?php echo form_input('fechadesde',$asignaturadeldocente['fechadesde'],array('type'=>'date', "disabled"=>"disabled",'placeholder'=>'fechainicia','style'=>'width:600px;')) ?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Fecha hasta:</label>
	<div class="col-md-10">
      <?php echo form_input('fechahasta',$asignaturadeldocente['fechahasta'],array('type'=>'date', "disabled"=>"disabled",'placeholder'=>'fechainicia','style'=>'width:600px;')) ?>
	</div> 
</div>


































<?php echo form_close(); ?>




<script type="text/javascript">

$(document).ready(function(){
	var idasignaturadeldocente=document.getElementById("idasignaturadeldocente").value;
	var idperiodoacademico=<?php echo $asignatura[0]->idperiodoacademico; ?>;
	var iddocente=  document.getElementById("iddocente").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('asignaturadeldocente/asignaturadocente_data')?>', type: 'GET',data:{idasignaturadeldocente:idasignaturadeldocente}},});

	var mytablaad= $('#mydataad').DataTable({"ajax": {url: '<?php echo site_url('docenteactividadacademica/docenteactividadacademica_data')?>', type: 'GET',data:{idasignaturadeldocente:idasignaturadeldocente}},});

	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('docente/silabo_data')?>', type: 'GET',data:{iddocente:iddocente,idperiodoacademico:idperiodoacademico}},});


	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('asignaturadeldocente/evento_data')?>', type: 'GET',data:{idasignaturadeldocente:idasignaturadeldocente}},});


});





$('#show_data').on('click','.item_gesi',function(){
var nombre= $(this).data('elperiodoacademico')+" - "+$(this).data('laasignatura') ;
var titulo= $(this).data('elperiodoacademico')+" - P"+$(this).data('paralelo')+" - "+$(this).data('laasignatura') ;
var descripcion= $(this).data('elperiodoacademico')+" - "+$(this).data('laasignatura') ;
var idperiodoacademico= $(this).data('idperiodoacademico');
var iddocente= $(this).data('iddocente');
var idpersona= $(this).data('idpersona');
var idasignatura= $(this).data('idasignatura');
var duracion= "4 meses";
var linkdetalle= "";
	var idsilabo=0;
	var idasignaturadocente=0;	
	var idcalendarioacademico=0;

	var fechainicia = ""; 
	var fechafinaliza= "";
$.ajax({url: '<?php echo site_url('silabo/save')?>',
	method: 'POST',
	data:{nombre:nombre,descripcion:descripcion,idperiodoacademico:idperiodoacademico,iddocente:iddocente,idasignatura:idasignatura,duracion:duracion,linkdetalle:linkdetalle},
	async : false,
	dataType: 'json',
	success: function(data){
	 idsilabo=data.idsilabo;
	 idasignaturadocente=data.idasignaturadocente;	
	 idcalendarioacademico=data.idcalendarioacademico;
	 fechainicia=data.fechainicio;
	 fechafinaliza=data.fechafin;
	
	},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }

	    })



	var idtipoevento=2; // CURSOS DE MALLA
	var idevento_estado=2; //INSCRIPCION
	var idinstitucion=1;  //Universidad Tecnica Luis Vargas Torres
	var detalle =titulo;
	var idusuario=0;
	var fecha= new Date();
	var duracion=0;
	var costo=0;	
	var codigoclassroom="";	

$.ajax({url: '<?php echo site_url('evento/save')?>',
	method: 'POST',
	data:{idtipoevento:idtipoevento,idevento_estado:idevento_estado,idinstitucion:idinstitucion,titulo:titulo,fechainicia:fechainicia,fechafinaliza:fechafinaliza,detalle:detalle,idusuario:idusuario,fecha:fecha,duracion:duracion,costo:costo,idsilabo:idsilabo,codigoclassroom:codigoclassroom,idasignaturadocente:idasignaturadocente,idcalendarioacademico:idcalendarioacademico,idpersona:idpersona},
	async : true,
	success: function(data){
	
	
	},
	      error: function (xhr, ajaxOptions, thrownError) {
		alert(xhr.status);
		alert(thrownError);
	      }
	    })




	
	






	});





$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('idasignaturadocente');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});






$('#show_datas').on('click','.item_ver',function(){
var id= $(this).data('idsilabo');
var retorno= $(this).data('retornos');
window.location.href = retorno+'/'+id;
});



$('#show_data1').on('click','.item_ver',function(){
var id= $(this).data('idevento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});



</script>

</body>









</html>
