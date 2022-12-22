<div id="eys-nav-i">
<h3 style="text-align: left; margin-top:-10px;"> <?php echo $title;  ?></h3>
	<ul>
<?php
if(isset($documentoportafolio) and !empty($documentoportafolio))
{
?>
        <li> <?php echo anchor('documentoportafolio/elprimero/', 'primero'); ?></li>
        <li> <?php echo anchor('documentoportafolio/anterior/'.$documentoportafolio['iddocumentoportafolio'], 'anterior'); ?></li>
        <li> <?php echo anchor('documentoportafolio/siguiente/'.$documentoportafolio['iddocumentoportafolio'], 'siguiente'); ?></li>
        <li style="border-right:1px solid green"><?php echo anchor('documentoportafolio/elultimo/', 'Último'); ?></li>
        <li> <?php echo anchor('documentoportafolio/add', 'Nuevo'); ?></li>
        <li> <?php echo anchor('documentoportafolio/edit/'.$documentoportafolio['iddocumentoportafolio'],'Edit'); ?></li>
        <li style="border-right:1px solid green"> <?php echo anchor('documentoportafolio/delete/'.$documentoportafolio['iddocumentoportafolio'],'Delete'); ?></li>
        <li> <?php echo anchor('documentoportafolio/listar/','Listar'); ?></li>
        <li> <?php echo anchor('documentoportafolio/listar_doce/','Portafolio'); ?></li>
        <li> <?php echo anchor('documentoportafolio/reportepdf/'.$documentoportafolio['iddocumentoportafolio'],'Reporte'); ?></li>

<?php 
}else{
?>

        <li> <?php echo anchor('documentoportafolio/add', 'Nuevo'); ?></li>
<?php
}
?>

    </ul>
</div>
<br>
<br>


<?php echo form_open('documentoportafolio/save_edit') ?>
<?php echo form_hidden('iddocumentoportafolio',$documentoportafolio['iddocumentoportafolio']) ?>


<div class="form-group row">
    <label class="col-md-2 col-form-label">Id portafolio:</label>
	<div class="col-md-10">


     <?php echo form_input('iddocumentoportafolio',$documentoportafolio['iddocumentoportafolio'],array("disabled"=>"disabled",'placeholder'=>'Iddocumentoportafolios')); ?>
 
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Docente:</label>
	<div class="col-md-10">
     <?php 
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->asunto;
}

echo form_input('iddocumento',$options[$documentoportafolio['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled", "style"=>"width:500px")); ?>
	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label">Id persona:</label>
	<div class="col-md-10">
  
     <?php 
$options= array("NADA");
foreach ($documentos as $row){
	$options[$row->iddocumento]= $row->idpersona;
}
echo form_input('idpersona',$options[$documentoportafolio['iddocumento']],array("id"=>"idpersona","disabled"=>"disabled", "style"=>"width:500px")); ?>
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
echo form_input('iddocumento',$options[$documentoportafolio['iddocumento']],array("id"=>"iddocumento","disabled"=>"disabled","style"=>"width:500px"));
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
	echo form_input('idportafolioestado',$options[$documentoportafolio['idportafolioestado']],array("disabled"=>"disabled", "style"=>"width:500px")); 
	?>

	</div> 
</div> 


---->


<div class="form-group row">
    <label class="col-md-2 col-form-label">Periodo académico:</label>
	<div class="col-md-10">
	<?php 
	$options= array("NADA");
	foreach ($portafolios as $row){
		$options[$row->idportafolio]= $row->nombrelargo;
	}
	echo form_input('idportafolio',$options[$documentoportafolio['idportafolio']],array("disabled"=>"disabled", "style"=>"width:500px")); 
	?>

	</div> 
</div>



<div class="form-group row">
    <label class="col-md-2 col-form-label"> Documentos del documento: </label>

	<div class="col-md-10">
	<div class="row justify-content-left">
      	<!-- Page Heading -->
 	<div class="row">
  	<div class="col-12">
	<table class="table table-striped table-bordered table-hover" id="mydatac">
	 <thead>
	 <tr>
	 <th>iddocu</th>
	 <th>idpersona</th>
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
	var mytablaf= $('#mydatac').DataTable({"ajax": {url: '<?php echo site_url('documentoportafolio/documento_data')?>', type: 'GET',data:{idpersona:idpersona}},});
});


$('#show_data').on('click','.item_ver',function(){
var id= $(this).data('iddocumento');
var retorno= $(this).data('retorno');
window.location.href = retorno+'/'+id;
});


</script>




</body>









</html>
