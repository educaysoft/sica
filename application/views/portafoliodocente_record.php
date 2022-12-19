<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($portafoliodocente) and !empty($portafoliodocente))
{
?>
        <li> <?php echo anchor('portafoliodocente/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('portafoliodocente/anterior/'.$portafoliodocente['idportafoliodocente'], 'anterior'); ?></li>
        <li> <?php echo anchor('portafoliodocente/siguiente/'.$portafoliodocente['idportafoliodocente'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('portafoliodocente/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('portafoliodocente/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('portafoliodocente/edit/'.$portafoliodocente['idportafoliodocente'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('portafoliodocente/delete/'.$portafoliodocente['idportafoliodocente'],'Delete'); ?></li>
        <li> <?php echo anchor('portafoliodocente/listar/','Listar'); ?></li>
        <li> <?php echo anchor('portafoliodocente/listar_doce/','Portafolio'); ?></li>
        <li> <?php echo anchor('portafoliodocente/reportepdf/'.$portafoliodocente['idportafoliodocente'],'Reporte'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('portafoliodocente/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('portafoliodocente/save_edit') ?>
<?php echo form_hidden('idportafoliodocente',$portafoliodocente['idportafoliodocente']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id portafolio:</label>
	<div class="col-md-10">


     <?php echo form_input('idportafoliodocente',$portafoliodocente['idportafoliodocente'],array("disabled"=>"disabled",'placeholder'=>'Idportafoliodocentes')); ?>
 
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Docente:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->eldocente;
}

echo form_input('iddocente',$options[$portafoliodocente['iddocente']],array("id"=>"iddocente","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Id persona:</label>
	<div class="col-md-10">
  
     <?php 
$options= array("NADA");
foreach ($docentes as $row){
	$options[$row->iddocente]= $row->idpersona;
}
echo form_input('idpersona',$options[$portafoliodocente['iddocente']],array("id"=>"idpersona","disabled"=>"disabled", "style"=>"width:500px")); ?>
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
echo form_input('iddocumento',$options[$portafoliodocente['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled","style"=>"width:500px"));
		?>
	</div> 
</div>

---->


<div class="form-group row">
    <label class="col-md-2 col-form-label">Estado del documento:</label>
	<div class="col-md-10">
	<?php 
	$options= array("NADA");
	foreach ($portafolioestados as $row){
		$options[$row->idportafolioestado]= $row->nombre;
	}
	echo form_input('idportafolioestado',$options[$portafoliodocente['idportafolioestado']],array("disabled"=>"disabled", "style"=>"width:500px")); 
	?>

	</div> 
</div> 




<div class="form-group row">
    <label class="col-md-2 col-form-label">Periodo académico:</label>
	<div class="col-md-10">
	<?php 
	$options= array("NADA");
	foreach ($periodoacademicos as $row){
		$options[$row->idperiodoacademico]= $row->nombrelargo;
	}
	echo form_input('idperiodoacademico',$options[$portafoliodocente['idperiodoacademico']],array("disabled"=>"disabled", "style"=>"width:500px")); 
	?>

	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Documentos del docente: </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddocente</th>
	 <th>idpersona</th>
	 <th>fecha</th>
	 <th>asunto</th>
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
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('portafoliodocente/documento_data')?>', type: 'GET',data:{idpersona:idpersona}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddocumento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>




</body>









</html>
