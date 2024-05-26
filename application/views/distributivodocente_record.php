<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($distributivodocente))
{
?>
   <li> <?php echo anchor('distributivodocente/elprimero/', 'primero'); ?></li>
   <li> <?php echo anchor('distributivodocente/anterior/'.$distributivodocente['iddistributivodocente'], 'anterior'); ?></li>
   <li> <?php echo anchor('distributivodocente/siguiente/'.$distributivodocente['iddistributivodocente'], 'siguiente'); ?></li>
   <li style="border-right:1px solid green"><?php echo anchor('distributivodocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('distributivodocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('distributivodocente/edit/'.$distributivodocente['iddistributivodocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('distributivodocente/quitar/'.$distributivodocente['iddistributivodocente'],'Quitar'); ?></li>
        <li> <?php echo anchor('distributivodocente/listar/','Listar'); ?></li>
        <li> <?php echo anchor('distributivodocente/reportepdf/'.$distributivodocente['iddistributivodocente'],'reportepdf'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('distributivodocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('distributivodocente/save_edit') ?>
<?php echo form_hidden('iddistributivodocente',$distributivodocente['iddistributivodocente']) ?>

<div class="form-group row">
    <label class="col-md-2 col-form-label"> Id distributivo docente: </label>
	<div class="col-md-10">
     	<?php 
      echo form_input('iddistributivodocente',$distributivodocente['iddistributivodocente'],array("id"=>"iddistributivodocente","disabled"=>"disabled",'placeholder'=>'Iddistributivodocentes')); 
		?>
	</div> 
</div>






<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('docente/actual/'.$distributivodocente['iddocente'], 'Docente:'); ?>  </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

echo form_input('eldocente',$options[$distributivodocente['iddocente']],array("id"=>"eldocente","disabled"=>"disabled",'style'=>'width:500px;')); 

echo form_input(array('name'=>'iddocente',"type"=>"hidden","value"=>$distributivodocente['iddocente'],"id"=>"iddocente")); 
		?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('distributivo/actual/'.$distributivodocente['iddistributivo'], 'Distributivo:'); ?> </label>
	<div class="col-md-10">
     	<?php 
    $options= array("NADA");
    foreach ($distributivo as $row){
	      $options[$row->iddistributivo]= $row->eldistributivo;
    }
    echo form_input('iddistributivo',$options[$distributivodocente['iddistributivo']],array("disabled"=>"disabled",'style'=>'width:500px;')); 
		?>
	</div> 
</div>





<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('tiempodedicacion/actual/'.$distributivodocente['idtiempodedicacion'], 'Tiempo dedicacion:'); ?>  </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($tiempodedicacions as $row){
	$options[$row->idtiempodedicacion]= $row->nombre;
}

echo form_input('idtiempodedicacion',$options[$distributivodocente['idtiempodedicacion']],array("id"=>"idtiempodedicacion","disabled"=>"disabled",'style'=>'width:500px;')); 

		?>
	</div> 
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label"><?php echo anchor('categoriadocente/actual/'.$distributivodocente['idcategoriadocente'], 'Tiempo dedicacion:'); ?>  </label>
	<div class="col-md-10">
     	<?php 
$options= array("NADA");
foreach ($categoriadocentes as $row){
	$options[$row->idcategoriadocente]= $row->nombre;
}

echo form_input('idcategoriadocente',$options[$distributivodocente['idcategoriadocente']],array("id"=>"idcategoriadocente","disabled"=>"disabled",'style'=>'width:500px;')); 

		?>
	</div> 
</div>






<div class="form-group row" >
  


	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">
<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Asignaturas  docente en el periodo</b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('asignaturadocente/add/'.$distributivodocente['iddistributivodocente']) ?>">Nueva asignatura</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddido</th>
	 <th>idasig</th>
	 <th>nivel</th>
	 <th>Asignatura</th>
	 <th>Paralelo</th>
	 <th>h.sema</th>
	 <th>h.hora</th>
	 <th>Estado</th>
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



<div class="form-group row">

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">

<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Distributivos individual</b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('docenteactividadacademica/add/'.$distributivodocente['iddistributivodocente']) ?>">Sumar actividad</a>
	    <a class="btn btn-danger" href="<?php echo base_url('docenteactividadacademica/reportepdf/'.$distributivodocente['iddistributivodocente']) ?>">Reporte individual</a>
        </div>
    </div>
</div>

h
	<table class="table table-striped table-bordered table-hover" id="mydataad">
	 <thead>
	 <tr>
	 <th>Id</th>
	 <th>docente</th>
	 <th>item</th>
	 <th>tipo</th>
	 <th>Actividad academica</th>
 	<th>Hor/sem</th>
 	<th>Hor/ocup</th>
 	<th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_dataad">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
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
            <b>Silabos  del docente</b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('silabo/add/') ?>">Crear un silabo</a>
        </div>
    </div>
</div>


	<table class="table table-striped table-bordered table-hover" id="mydatas">
	 <thead>
	 <tr>
	 <th>iddocente</th>
	 <th>idsilabo</th>
	 <th>elsilabo</th>
	 <th>periodo</th>
	 <th>Archivopdf</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_datas">
	 </tbody>
	</table>
	</div>
	</div>
	</div>
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
            <b>Eventos-cursos:</b>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('evento/add/') ?>">Crear un evento</a>
        </div>
    </div>
</div>

	<table class="table table-striped table-bordered table-hover" id="mydatae">
	 <thead>
	 <tr>
	 <th>idsilabo</th>
	 <th>idevento</th>
	 <th>evento</th>
	 <th>Classroom</th>
	 <th style="text-align: right;">Actions</th>
	 </tr>
	 </thead>
	 <tbody id="show_data1">
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
	var iddistributivodocente=document.getElementById("iddistributivodocente").value;
	var idperiodoacademico=<?php echo $distributivo[0]->idperiodoacademico; ?>;
	var iddocente=  document.getElementById("iddocente").value;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('distributivodocente/asignaturadocente_data')?>', type: 'GET',data:{iddistributivodocente:iddistributivodocente}},});

	var mytablaad= $('#mydataad').DataTable({"ajax": {url: '<?php echo site_url('docenteactividadacademica/docenteactividadacademica_data')?>', type: 'GET',data:{iddistributivodocente:iddistributivodocente}},});

	var mytablaf= $('#mydatas').DataTable({"ajax": {url: '<?php echo site_url('docente/silabo_data')?>', type: 'GET',data:{iddocente:iddocente,idperiodoacademico:idperiodoacademico}},});


	var mytablaf= $('#mydatae').DataTable({"ajax": {url: '<?php echo site_url('distributivodocente/evento_data')?>', type: 'GET',data:{iddistributivodocente:iddistributivodocente}},});


});





$('#show_data').on('click','.item_gesi',function(){
var nombre= $(this).data('elperiodoacademico')+" - "+$(this).data('laasignatura') ;
var titulo= $(this).data('elperiodoacademico')+" - P"+$(this).data('paralelo')+" - "+$(this).data('laasignatura') ;
var descripcion= $(this).data('elperiodoacademico')+" - "+$(this).data('laasignatura') ;
var idperiodoacademico= $(this).data('idperiodoacademico');
var iddocente= $(this).data('iddocente');
var idpersona= $(this).data('idpersona');
var idasignatura= $(this).data('idasignatura');
var idasignaturadocente=$(this).data('idasignaturadocente');	
var duracion= "4 meses";
var linkdetalle= "";
	var idsilabo=0;
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

$('#show_dataad').on('click','.item_ver',function(){
var id= $(this).data('iddocenteactividadacademica');
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
