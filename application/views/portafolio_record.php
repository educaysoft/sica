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
        <li> <?php echo anchor('portafolio/edit/'.$portafolio['idportafolio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('portafolio/delete/'.$portafolio['idportafolio'],'Delete'); ?></li>
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

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12" style="border:solid;">
<div class="row" style="background-color:lightgray; padding-top:0.5cm; padding-bottom:0.5cm; border-bottom:0.5cm solid white;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <b>Documentos del portafolio: </b>
        </div>
        <div class="pull-right">
          <a class="btn btn-danger" href="<?php echo base_url('documentoportafolio/add/'.$portafolio['idportafolio']) ?>">Nuevo documento</a>  
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
	var idperiodoacademico=<?php $portafolio["idperiodoacademico"]; ?>;
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('portafolio/documento_data')?>', type: 'GET',data:{idpersona:idpersona,idperiodoacademico:idperiodoacademico}},});
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





</script>




</body>









</html>
